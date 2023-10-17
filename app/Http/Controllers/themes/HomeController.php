<?php

namespace App\Http\Controllers\themes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Banner;
use App\Models\admin\Officer;
use App\Models\admin\Whatsnew;
use App\Models\admin\Feedback;
//use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        session()->get('locale')??Session::put('locale', 1);
        $langid=session()->get('locale')??1;
        $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
        $banner =  Banner::where('txtstatus',3)->where('language',$langid)->paginate(10);
        $officer =  Officer::where('txtstatus',3)->where('designation','MD')->where('language',$langid)->first();
        $todate=date('Y-m-d');
        $today= date("Y-m-d", strtotime($todate));
        $whatsnew = Whatsnew::where('enddate','>' ,$today)->where('txtstatus',3)->where('language',$langid)->paginate(5);
       // dd($whatsnew);
        return response()->view("themes/{$themes}/home", compact( 'banner','officer','whatsnew','title'));
    }
    public function feedback()
    {
        $title = 'Feedback';
        $langid=session()->get('locale')??1;
        $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
        // echo $themes;
        // die();
        return response()->view("themes/{$themes}/feedback", compact('title'));
    }
 
    public function feed_process(Request $request)
    {
       
        $rules = array(
            'name' => 'required',
            'email' =>  'required',
           'phone' => 'required',
           'comments' => 'required',
           'CaptchaCode'=>'required'
       );
       $validator = Validator::make($request->all(), $rules);
      
        if ($validator->fails()) {
            return  back()->withErrors($validator)->withInput();
        }else{
           
         $code = clean_single_input($request->CaptchaCode); 
         $isHuman = captcha_validate($code); //die();
        if ($isHuman) {
            
           $pArray['name']    				= clean_single_input($request->name); 
           $pArray['email']    				= clean_single_input($request->email);
           $pArray['phone']    				= clean_single_input($request->phone);
           $pArray['comments']    			= clean_single_input($request->comments);
          // dd($pArray);
           $create 	= Feedback::create($pArray);
        // echo  $create 	= Feedback::create($pArray); //die();
         
           if(empty( $create)){
             echo "heare"; die();
           }
           return redirect('feedback')->with('success','Feedback has successfully Submitted');
        }else{
            return redirect('feedback')->with('error','Captcha Is Wrong.');
        }
           
       }


    }
}
