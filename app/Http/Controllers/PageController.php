<?php

namespace App\Http\Controllers;


use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = halaman::orderBy('title', 'asc')->get();
        return view('dashboard/mainpage/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/mainpage/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('content', $request->content);
        
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'judul.required' => 'Title cannot be empty',
                'isi.required' => 'Content cannot be empty'
            ]
        );

        $data = [
            'title'=> $request->title,
            'content'=> $request->content
        ];
        halaman::create($data);

        return redirect()->route('mainpage.index')->with('success','data added successfully');
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
        $data = halaman::where('id', $id)->first();
        return view('dashboard/mainpage/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'judul.required' => 'Title cannot be empty',
                'isi.required' => 'Content cannot be empty'
            ]
        );

        $data = [
            'title'=> $request->title,
            'content'=> $request->content
        ];
        halaman::where('id', $id)->update($data);

        return redirect()->route('mainpage.index')->with('success','data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        halaman::where('id', $id)->delete();
        return redirect()->route('mainpage.index')->with('success','data deleted');
    }
}
