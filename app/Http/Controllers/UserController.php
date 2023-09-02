<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function index()
    {
      
        $user=user::where('user_type','!=',1)->get();
        $title="User List";
        return view('admin/user/users',compact(['user','title']));
 
    
    }

     public function create()
    {    $title="Add User";
         return view('admin/user/adduser',compact(['title']));
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
        //dd($user);
        $User = User::find($user);
        return view('admin/user/useredit',compact('user'));

    }
    public function update(Request $request, User $user)
    {

        $rules = array(
            'name' => 'required |max:255',
            'user_name' => 'required|max:255',
            'email'=>'required|email|unique:users',
            'designation'=>'required',
            'user_status'=>'required',
            'user_type'=>'required'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
          //  dd($user);
            return redirect('admin/user')->with('error','Something went wrong. Try again');
        } else {
            // store
        //dd($request);
            $id=$request['name'];
            $user = User::find($id);
            $user->name = $request['name'];
            $user->user_name = $request['user_name'];
            $user->email  = $request['email'];
            $user->login_name  =  $request['login_name'];
            $user->password  =  \Hash::make($request['password']);
            $user->designation  =  $request['designation'];
            $user->user_status  =  $request['user_status'];
            $user->user_type  =  $request['user_type'];
            
            $user->save();

            // redirect
            return redirect('admin/user')->with('success','User updated successfully');
        }
        //dd($request);
        
    }

     public function destroy(User $user)
    {
        $user->delete();
       
        return redirect('admin/user')->with('success','User deleted successfully');
    }
}
