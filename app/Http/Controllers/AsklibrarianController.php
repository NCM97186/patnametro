<?php

namespace App\Http\Controllers;

use App\Models\admin\Tbl_ask_librarians;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsklibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asklibrarian=Tbl_ask_librarians::all();
        
       // dd($asklibrarian);
        return view('admin.Asklibrarian',compact(['asklibrarian']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.Asklibrarian',compact(['asklibrarian']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'status' => 'required'
        ]);
        Tbl_ask_librarians::create([
            'status' => $request['status']
        ]);
         return redirect('admin/asklibrarian')->with('success','User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tbl_ask_librarians $Tbl_ask_librarians)
    {
         
       //dd($Tbl_ask_librarians);
         $Tbl_ask_librarians = Tbl_ask_librarians::find($Tbl_ask_librarians);
    // dd($asklibrarian);
    //     //dd($asklibrarian);
        return view('admin.asklibrarian_view',compact(['Tbl_ask_librarians']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tbl_ask_librarians $Tbl_ask_librarians)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tbl_ask_librarians $Tbl_ask_librarians)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tbl_ask_librarians $Tbl_ask_librarians)
    {
        $Tbl_ask_librarians->delete();
        return redirect('admin/asklibrarian')->with('success', 'asklibrarian deleted successfully');
    }
}
