<?php

namespace App\Http\Controllers\admin;
use App\Models\Admin_role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class User_roleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
     {
        $title="User Role List";
        $user_role=admin_role::all();
        
        
        return view('admin.user_role',compact(['user_role','title']));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="User Role Add";
         $user_role=admin_role::join('users', 'users.id', '=', 'admin_roles.role_id')
      ->select('users.name')
      ->get();
        
        return view('admin.add_user_role',compact(['user_role','title']));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    $request->validate([
            'user' => 'required',
            'user_type'=>'required',

 ]);
    
    $Admin_role['role_name'] = clean_single_input($request->input('user'));
    $Admin_role['role_type'] = clean_single_input($request->input('user_type'));
    $Admin_role['role_id'] = clean_single_input($request->input('user_type'));
    $Admin_role['role_status'] = clean_single_input($request->input('user_type'));
    $Admin_role['user_id'] = clean_single_input($request->input('user_type'));
    $Admin_role['module_id'] = clean_single_input($request->input('check_module'));

    
        Admin_role::create($Admin_role);
       
        return redirect('admin/user_role')
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
        $title=" Edit User role";
        $user_role_edit = $user_role=admin_role::leftJoin('users', 'users.id', '=', 'admin_roles.role_id')
      ->select('admin_roles.*','users.name')
      ->get();
        return view('admin.user_role_edit',compact(['user_role_edit','title']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin_role $admin_role)
    {
        $request->validate([
            'user' => 'required',
            'user_type'=>'required',

        ]);
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
