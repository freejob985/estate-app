<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PropertiesExport;



class PropertyController extends Controller
{
    /**
     * Display a listing of the properties.
     *
     * @return \Illuminate\Http\Response
     */
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
        // 'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    ]);
dd( $validatedData);
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
dd(1);
    return redirect()->route('properties.index')
        ->with('success', 'La propriété a été mise à jour avec succès.');
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
                         ->with('success', 'La propriété a été supprimée avec succès.');
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

}
