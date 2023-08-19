<?php

namespace App\Http\Controllers;

use App\Models\admin_role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User_roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
        $user_role=admin_role::all();
        
        
        return view('admin.user_role',compact(['user_role']));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

         $user_role=admin_role::leftJoin('users', 'users.id', '=', 'admin_roles.role_id')
      ->select('admin_roles.*','users.name')
      ->get();
        
        return view('admin.add_user_role',compact(['user_role']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
           
            'user' => 'required',
            'user_type'=>'required'
           

        ]);
       return admin_role::create([
           'role_name' => $request['user'],
           'role_type' => $request['user_type'],
           'module_id'=> $request['check_module']
           
        ]);
       
        return redirect()->route('admin/user_role')
                        ->with('success','user_role created successfully.');
       }

    /**
     * Display the specified resource.
     */
    public function show(admin_role $admin_role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admin_role $admin_role)
    {
        $user_role_edit = $user_role=admin_role::leftJoin('users', 'users.id', '=', 'admin_roles.role_id')
      ->select('admin_roles.*','users.name')
      ->get();
        return view('admin.user_role_edit',compact('user_role_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin_role $admin_role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin_role $admin_role)
    {
        //dd($admin_role);
        $admin_role->delete();
       return redirect('admin/user_role')->with('success', 'User_role deleted successfully');
    }
}
