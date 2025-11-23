<?php

namespace App\Http\Traits;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

trait uploadImage
{
    public function uploadImage($image, $folder)
    {
        // $imageNameWithoutExtension =  pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        // $imageNameExtension = '.' . $image->getClientOriginalExtension();
        // $time = substr(time(), -3);
        // $imageNameToStore =   $imageNameWithoutExtension . '-' . $time . $imageNameExtension;
        // $img = Image::make($image)->fit(700)->encode();
        // Storage::put($imageNameToStore);
        // Storage::move($imageNameToStore, "public/$folder/" . $imageNameToStore);

        // return $imageNameToStore;

        $imageNameWithoutExtension = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
    $imageNameExtension = '.' . $image->getClientOriginalExtension();
    $time = substr(time(), -3);
    $imageNameToStore = $imageNameWithoutExtension . '-' . $time . $imageNameExtension;

// Store the image directly to the specified folder
$path = $image->storeAs("public/$folder", $imageNameToStore);


return $imageNameToStore;

      
    }
}


