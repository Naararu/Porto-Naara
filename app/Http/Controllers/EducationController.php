<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EducationController extends Controller
{
    function __construct()
    {
        $this->_type = 'education';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= riwayat::Where('type', $this->_type)->orderBy('tgl_akhir','desc')->get();
        return view('dashboard/education/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/education/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('information1', $request->information1); //univ atau smanya
        Session::flash('information2', $request->information2); //fakultasnya apahh, tpi kalo sma gada jadi ga required
        Session::flash('information3', $request->information3); //major, berhubung sma jg ada jadi required
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);

        $request->validate(
            [
                'title' => 'required',
                'information2' => 'required', //majornya required misal kupake buat pas SMA
                'tgl_mulai' => 'required',
                
            ],
            [
                'title.required' => 'Title cannot be empty',
                'information1.required' => 'Company Name cannot be empty',
                'tgl_mulai.required' => 'Start Date cannot be empty',
            ]
        );

        $data = [
            'title'=> $request->title,
            'information1'=> $request->information1,
            'information2'=> $request->information2,
            'information3'=> $request->information3,
            'type'=> $this->_type,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_akhir'=> $request->tgl_akhir
        ];
        riwayat::create($data);

        return redirect()->route('education.index')->with('success','education data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = riwayat::where('id', $id)->where('type', $this->_type)->first();
        return view('dashboard/education/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'information2' => 'required', //majornya required misal kupake buat pas SMA
                'tgl_mulai' => 'required',
                
            ],
            [
                'title.required' => 'Title cannot be empty',
                'information1.required' => 'Company Name cannot be empty',
                'tgl_mulai.required' => 'Start Date cannot be empty',
            ]
        );

        $data = [
            'title'=> $request->title,
            'information1'=> $request->information1,
            'information2'=> $request->information2,
            'information3'=> $request->information3,
            'type'=> $this->_type,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_akhir'=> $request->tgl_akhir
        ];
        riwayat::where('id', $id)->update($data);

        return redirect()->route('education.index')->with('success','education data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('type',$this->_type)->delete();
        return redirect()->route('education.index')->with('success','education data deleted');
    }
}
