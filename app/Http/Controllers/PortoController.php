<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class PortoController extends Controller
{
    public function index()
    {
        $home_id = get_value('page_home');
        $home_data = halaman::where('id', $home_id)->first();

        $experience_data = riwayat::where('type', 'experience')->get();
        $education_data = riwayat::where('type', 'education')->get();
        
        return view ("porto/index")->with([
            'home' => $home_data,
            'experience' => $experience_data,
            'education' => $education_data
        ]);
    }
}
