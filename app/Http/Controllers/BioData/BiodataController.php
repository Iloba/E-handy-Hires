<?php

namespace App\Http\Controllers\BioData;

use Illuminate\Http\Request;
use App\Http\Traits\uploadImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
      'phone' => ['required', 'digits:11', 'unique:users,phone_number'],
      'age' => ['required', 'integer', 'min:1'],
      'gender' => ['required', 'string', 'max:255'],
      'disability' => ['required', 'string', 'max:255'],
      'identification' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:3048'],
      'address' => ['required', 'string', 'max:255'],
      'passport' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:3048'],
    ]);

    $identificationFile = $this->uploadImage($request->file('identification'), 'Means_of_identification_files');
    $passportPhoto = $this->uploadImage($request->file('passport'), 'Passport_Photographs');


    //Save the data
    $user = Auth::User();

    $disabilityStatus = $request->disability;

    if($disabilityStatus == "Yes"){
      $disabilityStatus = true;
    }else{
      $disabilityStatus = false;
    }

    $user->update([
        'phone_number' => $request->phone,
        'age' => $request->age,
        'gender' => $request->gender,
        'disability' => $disabilityStatus,
        'identification' =>  $identificationFile ,
        'address' => $request->address,
        'photo' => $passportPhoto
    ]);

    sweetalert()->addSuccess("Bio Update Successful");
    return redirect()->route('update.bio.data');

    //return a response
  }
}
