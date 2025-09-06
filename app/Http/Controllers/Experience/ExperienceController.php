<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function addExperience(){
        return view('experience.add-experience');
    }
}
