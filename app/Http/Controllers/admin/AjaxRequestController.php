<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
   
    function get_primarylink_menu(Request $request)
	{
        if($request->get_primarylink_menu=='get_primarylink_menu'){
            $language =clean_single_input($request->id);
            
            $data = array();
            $data['html'] = primarylink_menu($language);
           // dd( $data);
            echo json_encode($data);
            die();
        }
	}
    public function get_filter_menu(Request $request)
    {
        if($request->ajax())
        {
            $data = User::select('*');

            if($request->filled('from_date') && $request->filled('to_date'))
            {
                $data = $data->whereBetween('created_at', [$request->from_date, $request->to_date]);
            }

            return DataTables::of($data)->addIndexColumn()->make(true);
        }
        return view('users');
    }
}
