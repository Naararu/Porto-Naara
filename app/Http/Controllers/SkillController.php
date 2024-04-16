<?php

namespace App\Http\Controllers;
    
use App\Models\skills;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills_url = public_path('administrator/devicon.json');
        $skills_data = file_get_contents($skills_url);
        $skills_data = json_decode($skills_data, true);
        $skills =array_column($skills_data, 'name');
        $skills = "'" . implode("','", $skills) . "'";

        return view('dashboard/skill/index')->with(['skills' => $skills]);
    }

    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                '_language' => 'required',
                '_workflow' => 'required'
            ],[
                '_language.required' => 'Choose Programming Language',
                '_workflow.required' => 'Choose Workflow'
            ]
            );

            skills::updateOrCreate(['key' =>'_language'], ['value'=>$request->_language]);
            skills::updateOrCreate(['key' =>'_workflow'], ['value'=>$request->_workflow]);
            return redirect()->route('skill.index')->with('success','skill updated successfully');
        }

    }

}

