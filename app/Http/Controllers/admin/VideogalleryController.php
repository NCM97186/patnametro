<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Videogallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $title="Videogallery";
        
         $list = Videogallery::paginate(10);
         return view('admin/videogallery/index',compact(['list','title']));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $title=" add Videogallery";
         return view('admin/videogallery/add',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'language'=>'required',
            'title' => 'required |max:255',
            'txtstatus'=>'required',
            'txtuplode'=> 'required|mimes:mp4,YouTube, Vimeo, Wistia|max:1999',

            ]);
        Videogallery::create([
           'language' => clean_single_input($request['language']),
           'title' => clean_single_input($request['title']),
           'txtstatus' => clean_single_input($request['txtstatus']),
           'txtuplode' => clean_single_input($request['txtuplode']),
           
           
           
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogallery $videogallery)
    {
        //
    }
}
