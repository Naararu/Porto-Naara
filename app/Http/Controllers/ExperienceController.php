<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    function __construct()
    {
        $this->_type = 'experience';
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= riwayat::Where('type', $this->_type)->orderBy('tgl_akhir','desc')->get();
        return view('dashboard/experience/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/experience/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('information1', $request->information1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('content', $request->content);

        $request->validate(
            [
                'title' => 'required',
                'information1' => 'required',
                'tgl_mulai' => 'required',
                'content' => 'required'
                
            ],
            [
                'title.required' => 'Title cannot be empty',
                'information1.required' => 'Company Name cannot be empty',
                'tgl_mulai.required' => 'Start Date cannot be empty',
                'content.required' => 'Content cannot be empty'
            ]
        );

        $data = [
            'title'=> $request->title,
            'information1'=> $request->information1,
            'type'=> $this->_type,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_akhir'=> $request->tgl_akhir,
            'content'=> $request->content
        ];
        riwayat::create($data);

        return redirect()->route('experience.index')->with('success','experience data added successfully');
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
        return view('dashboard/experience/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'information1' => 'required',
                'tgl_mulai' => 'required',
                'content' => 'required'
                
            ],
            [
                'title.required' => 'Title cannot be empty',
                'information1.required' => 'Company Name cannot be empty',
                'tgl_mulai.required' => 'Start Date cannot be empty',
                'isi.required' => 'Content cannot be empty'
            ]
        );

        $data = [
            'title'=> $request->title,
            'information1'=> $request->information1,
            'type'=> $this->_type,
            'tgl_mulai'=> $request->tgl_mulai,
            'tgl_akhir'=> $request->tgl_akhir,
            'content'=> $request->content
        ];
        riwayat::where('id', $id)->update($data);

        return redirect()->route('experience.index')->with('success','experience data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id)->where('type',$this->_type)->delete();
        return redirect()->route('experience.index')->with('success','experience data deleted');
    }
}
