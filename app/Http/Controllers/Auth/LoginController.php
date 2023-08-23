<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Carbon\Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

   
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Create a new controller instance.
     * New changes 
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {   
        
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'CaptchaCode'=>'required',
        ]);
        $code = $request->input('CaptchaCode');
        $isHuman = captcha_validate($code);
    
        if ($isHuman) {
       
        
            if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
            {   $date=Carbon::now();
                User::where('email', $input['email'])->update(['last_login_date' => $date]);
                if (auth()->user()->userType == 'admin') {
                    return redirect()->route('admin.home');
                }else if (auth()->user()->userType == 'vendor') {
                    return redirect()->route('vendor.home');
                }else{
                    return redirect()->route('home');
                }
            }else{
            
                return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
            }
        } else {
            return redirect()->route('login')->with('error','Captcha Is Wrong.');
        }
          
    }
}
