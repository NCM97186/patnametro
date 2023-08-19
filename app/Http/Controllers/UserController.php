<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use DB;
class UserController extends Controller
{
    public function index()
    {
      
     $user=user::where('user_type','!=',1)->get();
         //$user = DB::select("select * from users where user_type!=1  ");

        return view('admin.users',compact(['user']));
     //}
    
    }

     public function create()
    {
         return view('admin.adduser');
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
           'name' => $request['name'],
           'user_name' => $request['user_name'],
           'email' => $request['email'],
          'login_name' => $request['login_name'],
           'password' => \Hash::make($request['password']),
           'designation' => $request['designation'],
           'user_status' => $request['user_status'],
           'user_type' => $request['user_type']
        ]);
       
        return redirect('admin/user')->with('success','User created successfully.');
    }
    public function show(Request $request)
    {
        //
    }

   
    public function edit(User $user)
    {
        //$User = User::find($user);
        return view('admin.useredit',compact('user'));

    }
    public function update(Request $request, User $user)
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
       User::edit([
           'name' => $request['name'],
           'user_name' => $request['user_name'],
           'email' => $request['email'],
           'login_name' => $request['login_name'],
           'password' => \Hash::make($request['password']),
           'designation' => $request['designation'],
           'user_status' => $request['user_status'],
           'user_type' => $request['user_type']
        ]);
       
      
        return redirect('admin/user')->with('success','User updated successfully');
    }

     public function destroy(User $user)
    {
        $user->delete();
       
        return redirect('admin/user')->with('success','User deleted successfully');
    }
}
