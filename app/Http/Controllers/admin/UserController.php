<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index()
    {
        $title="User List";
      
     $user=user::where('user_type','!=',1)->get();
         //$user = DB::select("select * from users where user_type!=1  ");

        return view('admin.user.users',compact(['user','title']));
     //}
    
    }

     public function create()
    {
        $title="User List";
         return view('admin.user.adduser',compact(['title']));
    }
    public function store(Request $request)
    {
       $request->validate([
            'name' => 'required |max:255',
            'user_name' => 'required|max:255',
            'email'=>'required|email|unique:users',
            'login_name'=>'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'designation'=>'required',
            'user_status'=>'required',
            'user_type'=>'required'

        ]);
        User::create([
           'name' => clean_single_input($request['name']),
           'user_name' => clean_single_input($request['user_name']),
           'email' => clean_single_input($request['email']),
           'login_name' => clean_single_input($request['login_name']),
           'password' => \Hash::make(clean_single_input($request['password'])),
           'designation' => clean_single_input($request['designation']),
           'user_status' => clean_single_input($request['user_status']),
           'user_type' => clean_single_input($request['user_type'])
        ]);
       
        return redirect('admin/user')->with('success','User created successfully.');
    }
    public function show(Request $request)
    {
        //
    }

   
    public function edit(User $user)
    {
         $title=" Edit User";
        return view('admin.user.useredit',compact('user','title'));

    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required |max:255',
            'user_name' => 'required|max:255',
            'email'=>'required|email',
            'login_name'=>'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'designation'=>'required',
            'user_status'=>'required',
            'user_type'=>'required',
]);
           $user = User::find($id);
           $user['name'] = clean_single_input($request['name']);
           $user['user_name'] = clean_single_input($request['user_name']);
           $user['email'] = clean_single_input($request['email']);
           $user['login_name'] = clean_single_input($request['login_name']);
           $user['password'] = \Hash::make(clean_single_input($request['password']));
           $user['designation'] = clean_single_input($request['designation']);
           $user['user_status'] = clean_single_input($request['user_status']);
           $user['user_type'] = clean_single_input($request['user_type']);
           $user->save();
        //$user->fill(clean_single_input($request->post()))->save();
       
       
      
        return redirect('admin/user')->with('success','User updated successfully');
    }

     public function destroy(User $user)
    {
        $user->delete();
       
        return redirect('admin/user')->with('success','User deleted successfully');
    }
}