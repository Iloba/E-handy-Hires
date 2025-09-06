<?php

namespace App\Http\Controllers\BioData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\uploadImage;

class BiodataController extends Controller
{
  use uploadImage;
  public function update()
  {
    return view('bio-data.index');
  }

  public function saveBioData(Request $request)
  {
    //Validate the form
    $request->validate([
      'phone' => ['required', 'digits:11'],
      'age' => ['required', 'integer', 'min:1'],
      'gender' => ['required', 'string', 'max:255'],
      'disablility' => ['required', 'string', 'max:255'],
      'identification' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:3048'],
      'address' => ['required', 'string', 'max:255'],
      'passport' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:3048'],
    ]);



    //Upload the files
    $identificationFile = $this->uploadImage($request->file('identification'), 'Means_of_identification_files');
    $passportPhoto = $this->uploadImage($request->file('passport'), 'Passport_Photographs');

    dd("Image Uploaded");
    //Save the data

    //return a response
  }
}
