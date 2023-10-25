<?php

namespace App\Http\Controllers\themes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Banner;
use App\Models\admin\Officer;
use App\Models\admin\Feedback;
use App\Models\admin\Whatsnew;
use App\Models\admin\Circular;
use App\Models\admin\Menu;
//use Session;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
       
        $langid=session()->get('locale')??1;
        $themes=!empty(get_setting($langid)->themes)?get_setting($langid)->themes:'th1';
        $banner =  Banner::where('txtstatus',3)->where('language',$langid)->orderBy('updated_at', 'DESC')->select('id','title','language','txtuplode','txtstatus','admin_id')->paginate(10);
        $officer = Officer::where('txtstatus',3)->where('designation','MD')->where('language',$langid)->select('id','officers_name','url','designation','contents','language','txtuplode','txtstatus')->first();
        $todate=date('Y-m-d');
        $today= date("Y-m-d", strtotime($todate));
        $whatsnew = Whatsnew::where('enddate','>' ,$today)->where('txtstatus',3)->where('language',$langid)->select('id','title','url','page_url','is_new','language','menutype','metakeyword','metadescription','description','txtuplode','txtweblink','txtstatus','startdate','enddate')->paginate(5);
        $announcement = Circular::where('enddate','>' ,$today)->where('txtstatus',3)->where('language',$langid)->select('id','title','url','page_url','is_new','language','menutype','metakeyword','metadescription','description','txtuplode','txtweblink','txtstatus','startdate','enddate')->paginate(5);
        $mf=0;
        if($langid==1){
        $mf=164;
       }if($langid==2){
        $mf=170;
       }
        $important	 = Menu::where('m_flag_id' ,$mf)->where('approve_status',3)->where('language_id',$langid)->orderBy('page_postion', 'ASC')->select('id','m_id','m_type','m_flag_id','menu_positions','language_id','m_name','m_url','m_title','m_keyword','m_description','content','doc_uplode','linkstatus','approve_status','page_postion','welcomedescription')->paginate(5);
       // dd($important);
        return response()->view("themes/{$themes}/home", compact( 'banner','officer','whatsnew','announcement','title','important'));
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
