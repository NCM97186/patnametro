<?php

namespace App\Http\Controllers\themes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Banner;
use App\Models\admin\Officer;
use App\Models\admin\Whatsnew;
use App\Models\admin\Circular;
use App\Models\admin\Menu;
//use Session;
use Illuminate\Support\Facades\Session;


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
        $important	 = Menu::where('m_flag_id' ,$mf)->where('approve_status',3)->where('language_id',$langid)->orderBy('page_postion', 'ASC')->select('id','m_id','m_type','m_flag_id','menu_positions','language_id','m_name','m_url','m_title','m_keyword','m_description','content','doc_uplode','linkstatus','approve_status','page_postion','welcomedescription')->paginate(8);
       // dd($important);
        return response()->view("themes/{$themes}/home", compact( 'banner','officer','whatsnew','announcement','title','important'));
    }
}
