<?php

namespace App\Http\Controllers;

use App\Models\skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard/profile/index');
    }
    public function update(Request $request)
    {
            $request->validate([
                '_photo' => 'mimes:jpeg,jpg,png,gif',
                '_email' => 'required'
            ],[
                '_photo.mimes' => 'Photo cannot be empty (jpg,jpeg,png,gif',
                '_email.required' => 'Email cannot be empty',
                '_email.email' => 'Invalid Email!'
            ]
            );

            if ($request->hasFile('_photo')) {
                $photo = $request->file('_photo');
                $photo_ekstensi = $photo->extension();
                $photo_new = date('ymdhis'). ".$photo_ekstensi";
                $photo->move(public_path('photo'), $photo_new);
                // update foto maka delete foto lamanya
                $photo_old = get_value('_photo');
                File::delete(public_path('photo'). "/". $photo_old);
                
                skills::updateOrCreate(['key' =>'_photo'], ['value'=>$photo_new]);
            }

            skills::updateOrCreate(['key' =>'_email'], ['value'=>$request->_email]);
            skills::updateOrCreate(['key' =>'_city'], ['value'=>$request->_city]);
            skills::updateOrCreate(['key' =>'_province'], ['value'=>$request->_province]);
            skills::updateOrCreate(['key' =>'_number'], ['value'=>$request->_number]);


            skills::updateOrCreate(['key' =>'_linkedin'], ['value'=>$request->_linkedin]);
            skills::updateOrCreate(['key' =>'_ig'], ['value'=>$request->_ig]);
            skills::updateOrCreate(['key' =>'_github'], ['value'=>$request->_github]);

            return redirect()->route('profile.index')->with('success','profile data updated successfully');
    }
}
