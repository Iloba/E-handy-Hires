<?php

namespace App\Http\Controllers\Skills;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    public function addSkill()
    {   
        $skills = auth()->user()->skills;
        return view('skills.add-skill', [
            'skills' => $skills
        ]);
    }

    public function saveSkill(Request $request)
    {

        $request->validate([
            'skill_category' => ['required', 'string', 'max:255',],
            'skill_type' => ['required', 'string', 'max:255'],
        ]);

        //Check if the person has saved up to 5 skills
        if (auth()->user()->skills()->count() >= 5) {
            sweetalert()->addError("You can only add 5 Skills.");
            return back();
        }

        //save the skill
        $skill = new Skill();
        $skill->user_id = auth()->user()->id;
        $skill->skill_category = $request->skill_category;
        $skill->skill_type = $request->skill_type;
        $skill->save();

        sweetalert()->addSuccess("Skill Added Successfully");
        return redirect()->route('add.skills');
    }

    public function ViewSkills()
    {
        $skills = auth()->user()->skills;
        return view('skills.view-skills', [
            'skills' => $skills
        ]);
    }

    public function deleteSkill(Skill $skill){
       
        // Check if user owns the skill they want to delete
        if ($skill->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $skill->delete();

        sweetalert()->addSuccess("Skill Deleted Successfully");
        return back();
    }
}
