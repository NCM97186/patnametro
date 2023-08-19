<?php

namespace App\Http\Controllers;

use App\Models\admin\tbl_plan_visits;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanyourvisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Planyourvisit=tbl_plan_visits::all();
        
        
        return view('admin.Planyourvisit',compact(['Planyourvisit']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.Planyourvisit',compact(['Planyourvisit']));
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
         return redirect('admin/Planyourvisit')->with('success','User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_plan_visits $tbl_plan_visits)
    {
        //$Planyourvisit=tbl_plan_visits::all();
        return view('admin.planyourvisit_view',compact(['tbl_plan_visits']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tbl_plan_visits $tbl_plan_visits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_plan_visits $tbl_plan_visits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_plan_visits $tbl_plan_visits)
    {
        //
    }
}
