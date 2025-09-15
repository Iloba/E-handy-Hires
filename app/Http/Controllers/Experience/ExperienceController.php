<?php

namespace App\Http\Controllers\Experience;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function addExperience(){
        return view('experience.add-experience');
    }

    public function saveExperience(Request $request){
       $request->validate([
            'name_of_workplace' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string', 'max:255'],
            'end_date' => ['required', 'string', 'max:255'],
            'r_held' => ['required', 'string'],
            'reference' => ['required', 'string'],
       ]);

       if (auth()->user()->experiences()->count() >= 5) {
        sweetalert()->addError("You can only add 5 Experiences.");
        return back();
    }

       //save Experience
       $experience = new Experience();
       $experience->user_id = auth()->user()->id;
       $experience->name_of_workplace = $request->name_of_workplace;
       $experience->start_date = $request->start_date;
       $experience->end_date = $request->end_date;
       $experience->responsibilities_held = $request->r_held;
       $experience->reference = $request->reference;
       $experience->save();


       sweetalert()->addSuccess("Experience Added Successfully");
        return back();
    } 

    public function viewExperience(){
        $experiences = auth()->user()->experiences;
        return view('experience.view-experience', [
            'experiences' => $experiences
        ]);
    }

    public function deleteExperience(Experience $experience){
         if ($experience->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $experience->delete();

        sweetalert()->addSuccess("Experience Deleted Successfully");
        return back();
    }
}
