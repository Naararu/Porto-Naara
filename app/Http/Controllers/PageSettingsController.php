<?php

namespace App\Http\Controllers;

use App\Models\skills;
use App\Models\halaman;
use Illuminate\Http\Request;

class PageSettingsController extends Controller
{
    public function index()
    {
        $pagedata = halaman::orderBy('title', 'asc')->get();
        return view("dashboard/pagesettings.index")->with('pagedata', $pagedata);
    }
    public function update(Request $request)
    {
        skills::updateOrCreate(['key' =>'page_home'], ['value'=>$request->page_home]);

        return redirect()->route('pagesettings.index')->with('success','Page settings data updated successfully');
    }
}
