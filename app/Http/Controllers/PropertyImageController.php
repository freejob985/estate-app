<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PropertyImage;
use Illuminate\Support\Facades\Storage;

class PropertyImageController extends Controller
{


  public function destroy(PropertyImage $image)
    {
        Storage::delete($image->image_path);
        $image->delete();

        return redirect()->back()->with('success', 'تم حذف الصورة بنجاح.');
    }


}
