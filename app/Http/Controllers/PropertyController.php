<?php

namespace App\Http\Controllers;


use File;
use Validator;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Codedge\Pdf\Pdf;



use Barryvdh\Snappy\Facades\SnappyPdf;


use App\Exports\PropertiesExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
// use Niklasravnsborg\LaravelPdf\Facades\Pdf;




class PropertyController extends Controller
{
    /**
     * Display a listing of the properties.
     *
     * @return \Illuminate\Http\Response
     */

//   public function exportPdf(Property $property)
//     {
//         $property->load('images');
//         $pdf = Pdf::loadView('properties.pdf', compact('property'));
//         return $pdf->download('property_' . $property->unit_code . '.pdf');
//     }



    public function exportPdf(Property $property)
    {
        $property->load('images');
        $html = view('properties.pdf', compact('property'))->render();
        $pdf = \Pdf::loadHTML($html)
            ->setOptions([
                'defaultFont' => 'DejaVu Sans',
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);
        return $pdf->stream('property_' . $property->unit_code . '.pdf');
    }

public function index(Request $request)
{
    $search = $request->input('search');
    $properties = Property::when($search, function ($query, $search) {
        return $query->where('unit_code', 'like', "%$search%")
            ->orWhere('unit_type', 'like', "%$search%")
            ->orWhere('phase', 'like', "%$search%")
            ->orWhere('floor', 'like', "%$search%")
            ->orWhere('client_number', 'like', "%$search%")
            ->orWhere('region', 'like', "%$search%")
            ->orWhere('compound_name', 'like', "%$search%");
    })->with('images')->paginate(10);

    return view('welcome', compact('properties'));
}

    /**
     * Show the form for creating a new property.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('properties.create');
    }

    /**
     * Store a newly created property in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified property.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
public function show(Property $property)
{
    $property->load('images');
    return view('properties.show', compact('property'));
}

    /**
     * Show the form for editing the specified property.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $property->load('images');

        return view('properties.edit', compact('property'));
    }
public function store(Request $request)
{
    $validatedData = $request->validate([
        'project_name' => 'required|string',
        'unit_code' => 'required|string',
        'unit_type' => 'required|string',
        'phase' => 'required|string',
        'floor' => 'required|string',
        'area' => 'required|numeric',
        'received' => 'nullable|numeric',
        'paid' => 'nullable|numeric',
        'over_payment' => 'nullable|numeric',
        'down_payment' => 'nullable|numeric',
        'installments' => 'nullable|numeric',
        'remaining' => 'nullable|numeric',
        'maintenance' => 'nullable|numeric',
        'total' => 'nullable|numeric',
        'notes' => 'nullable|string',
        'client_number' => 'required|string',
        'region' => 'required|string',
        'last_updated' => 'nullable|date',
        'compound_name' => 'required|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ], [
        'required' => 'الحقل :attribute مطلوب.',
        'string' => 'الحقل :attribute يجب أن يكون نصًا.',
        'numeric' => 'يجب أن يكون الحقل :attribute رقمًا.',
        'date' => 'يجب أن يكون الحقل :attribute تاريخًا صالحًا.',
        'image' => 'يجب أن يكون الحقل :attribute صورة.',
        'mimes' => 'يجب أن يكون الحقل :attribute من نوع: :values.',
        'max' => 'يجب ألا يتجاوز حجم الحقل :attribute :max كيلوبايت.',
    ], [
        'project_name' => 'اسم المشروع',
        'unit_code' => 'رمز الوحدة',
        'unit_type' => 'نوع الوحدة',
        'phase' => 'المرحلة',
        'floor' => 'الطابق',
        'area' => 'المساحة',
        'received' => 'المبلغ المستلم',
        'paid' => 'المبلغ المدفوع',
        'over_payment' => 'المبلغ الزائد',
        'down_payment' => 'الدفعة المقدمة',
        'installments' => 'الأقساط',
        'remaining' => 'المبلغ المتبقي',
        'maintenance' => 'رسوم الصيانة',
        'total' => 'المجموع',
        'notes' => 'ملاحظات',
        'client_number' => 'رقم العميل',
        'region' => 'المنطقة',
        'last_updated' => 'آخر تحديث',
        'compound_name' => 'اسم المجمع',
        'images.*' => 'صور الوحدة',
    ]);

    $property = Property::create($validatedData);

    if ($request->hasFile('images')) {
        $images = $request->file('images');
        foreach ($images as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'property_images/' . $property->project_name . '_' . now()->format('Y-m-d') . '/' . $imageName;
            $image->move(public_path($imagePath), $imageName);
            $property->images()->create([
                'image_path' => $imagePath,
            ]);
        }
    }

    return redirect()->route('properties.index')->with('success', 'تم إضافة العقار بنجاح.');
}
    /**
     * Update the specified property in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, Property $property)
{
  $validatedData = $request->validate([
        'unit_code' => 'required',
        'unit_type' => 'required',
        'phase' => 'required',
        'floor' => 'required',
        'area' => 'required|numeric',
        'received' => 'nullable|numeric',
        'paid' => 'nullable|numeric',
        'over_payment' => 'nullable|numeric',
        'down_payment' => 'nullable|numeric',
        'installments' => 'nullable|numeric',
        'remaining' => 'nullable|numeric',
        'maintenance' => 'nullable|numeric',
        'total' => 'nullable|numeric',
        'notes' => 'nullable',
        'client_number' => 'required',
        'region' => 'required',
        'last_updated' => 'nullable|date',
        'compound_name' => 'required',
        'project_name' => 'required',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ], [
        'required' => 'الحقل :attribute مطلوب.',
        'numeric' => 'يجب أن يكون الحقل :attribute رقمًا.',
        'date' => 'يجب أن يكون الحقل :attribute تاريخًا صالحًا.',
        'image' => 'يجب أن يكون الحقل :attribute صورة.',
        'mimes' => 'يجب أن يكون الحقل :attribute من نوع: :values.',
        'max' => 'يجب ألا يتجاوز حجم الحقل :attribute :max كيلوبايت.',
    ], [
        'unit_code' => 'رمز الوحدة',
        'unit_type' => 'نوع الوحدة',
        'phase' => 'المرحلة',
        'floor' => 'الطابق',
        'area' => 'المساحة',
        'received' => 'المبلغ المستلم',
        'paid' => 'المبلغ المدفوع',
        'over_payment' => 'المبلغ الزائد',
        'down_payment' => 'الدفعة المقدمة',
        'installments' => 'الأقساط',
        'remaining' => 'المبلغ المتبقي',
        'maintenance' => 'رسوم الصيانة',
        'total' => 'المجموع',
        'notes' => 'ملاحظات',
        'client_number' => 'رقم العميل',
        'region' => 'المنطقة',
        'last_updated' => 'آخر تحديث',
        'compound_name' => 'اسم المجمع',
        'project_name' => 'اسم المشروع',
        'images.*' => 'صور الوحدة',
    ]);

    $projectName = $validatedData['project_name'];
    $projectDirectory = 'property_images/' . $projectName . '_' . now()->format('Y-m-d');

    $property->update($validatedData);

    // حذف الصور القديمة
    foreach ($property->images as $image) {
        $imagePath = public_path($image->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
    }

    $property->images()->delete(); // حذف جميع الصور من قاعدة البيانات

    if ($request->hasFile('images')) {
        $images = $request->file('images');
        foreach ($images as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $projectDirectory . '/' . $imageName;
            $image->move(public_path($projectDirectory), $imageName);
            $property->images()->create([
                'image_path' => $imagePath,
            ]);
        }
    }
// dd(1);
    return redirect()->route('properties.index')
        ->with('success', 'تم التعديل بنجاح');
}

    /**
     * Remove the specified property from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->images()->delete(); // Supprimer toutes les images associées
        $property->delete(); // Supprimer la propriété

        return redirect()->route('properties.index')
                         ->with('success', 'تم الحذف بنجاح');
    }
    public function showModal(Property $property)
    {
        $property->load('images');
        return response()->json([
            'html' => view('properties.show-modal', compact('property'))->render()
        ]);
    }


public function exportProperties()
{
    $export = new PropertiesExport();
    return Excel::download($export, 'properties.xlsx');
}

public function uploadImages(Request $request, Property $property)
{
    $validator = Validator::make($request->all(), [
        'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ], [
        'images.*.required' => 'يجب اختيار صورة واحدة على الأقل',
        'images.*.image' => 'يجب أن تكون الملفات من نوع صور',
        'images.*.mimes' => 'يجب أن تكون الصور من نوع: :values',
        'images.*.max' => 'يجب ألا يتجاوز حجم الصور :max كيلوبايت',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()->all()], 422);
    }

    $images = $request->allFiles('images');
    $projectName = $property->project_name;
    $projectDirectory = 'property_images/' . $projectName . '_' . now()->format('Y-m-d');

    foreach ($images as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $projectDirectory . '/' . $imageName;
        $image->move(public_path($projectDirectory), $imageName);

        $propertyImage = new PropertyImage();
        $propertyImage->property_id = $property->id;
        $propertyImage->image_path = $imagePath;
        $propertyImage->save();
    }

    return response()->json(['message' => 'تم رفع الصور بنجاح']);
}


public function showUploadImagesForm(Property $property)
{
    return view('properties.upload-images', compact('property'));
}

}
