<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function addSkill(){
       return view('skills.add-skill');
    }
}
