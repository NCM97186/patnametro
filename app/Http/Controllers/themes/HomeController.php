<?php

namespace App\Http\Controllers\themes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Banner;
use App\Models\admin\Officer;
use App\Models\admin\Whatsnew;
//use Session;
use Illuminate\Support\Facades\Session;


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
}
