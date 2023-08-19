<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\admin\Controller;
use Illuminate\Http\Request;
use \DB;
class UserController extends Controller
{
    public function index()
    {
     $user=user::where('user_type','!=',1)->get();
         //$user = $data = DB::select('select * from users where user_type!=1 ');

        return view('admin.users',compact(['user']));
     
    
    }
    public function USer_role()
    {
       return view('admin.users_role'); 
    }
    public function edit(User $user)
    {
        return view('admin.useredit',compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'user_name' => 'required',
            'email'=>'required|email|unique:users'
        ]);
      
        $user->update($request->all());
      
        return redirect()->route('user.edit')
                        ->with('success','User updated successfully');
    }

     public function destroy(User $user)
    {
        $user->delete();
       
        return redirect()->route('user.destroy')
                        ->with('success','User deleted successfully');
    }
}
