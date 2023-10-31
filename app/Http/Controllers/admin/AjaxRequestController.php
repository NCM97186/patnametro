<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Menu;
use App;
class AjaxRequestController extends Controller
{
   // function for get primary menu on ajax request created by laukesh 
   // clean_single_input is helpers function for remove html tags for input/request
    function get_primarylink_menu(Request $request)
	{
        if($request->get_primarylink_menu=='get_primarylink_menu'){
            $language =clean_single_input($request->id);
            
            $data = array();
            $data['html'] = primarylink_menu($language);
             echo json_encode($data);
            die();
        }
	}
 // function for get primary module on ajax request created by laukesh 
    function get_primarylink_module(Request $request)
	{
        if($request->get_primarylink_module=='get_primarylink_module'){
            $language =clean_single_input($request->id);
            
            $data = array();
            $data['html'] = primarylink_module($language);
            echo json_encode($data);
            die();
        }
	}
     // function for filter menu  on ajax request created by laukesh 
    public function get_filter(Request $request)
    {
        if($request->ajax())
        {
            $module=clean_single_input($request->menusearch);
            $title=clean_single_input($request->title);
            $approve_status=clean_single_input($request->approve_status);
            $language_id=clean_single_input($request->language_id);
            App::setLocale($module);
            session()->put('approve_status_'.$module, $approve_status);
            session()->put('language_id_'.$module, $language_id);
            session()->put('title_'.$module,$title);
            session()->put($module,$module);
            $approve_status2=session()->get('approve_status_'.$module);
            $titlesearch=session()->get('title_'.$module);
            $language_idww=session()->get('language_id_'.$module);
            $msg=[
               'module'=> $module,
               'approve_status'=> $approve_status2,
               'language_id'=> $language_idww,
               'title'=> $titlesearch,
            ];
            echo json_encode($msg);
            die();
        }
       
    }
     // function for update menu orders  on ajax request created by laukesh 
    public function update_menu_orders(Request $request)
    {
        $msg=array();
        if($request->ajax())
        {
            $id= clean_single_input( $request->id);
            $pArray['page_postion'] =clean_single_input( $request->page_postion);
            
            $data = Menu::where('id', $id)->first();
           
            if($data->page_postion!==$request->page_postion){

               $create 	= Menu::where('id', $id)->update($pArray);
                $msg['success']='This Postion is Updated';
            }else{
                $msg['error']='This Postion Alredy Taken';
            }
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;

            if($create > 0){
				$audit_data = array('user_login_id'     =>  $user_login_id,
								'page_id'           	=>  $lastInsertID,
								'page_name'             =>  clean_single_input($data->menu_title),
								'page_action'           =>  'Update',
								'page_category'         =>  clean_single_input($data->m_type),
								'lang'                  =>  clean_single_input($data->language_id),
								'page_title'        	=> 'Menu Model',
								'approve_status'        => clean_single_input($data->approve_status),
								'usertype'          	=> 'Admin'
							);
				// audit_trail is helpers function for insert menu orders  on ajax request  in audit_trail table created by laukesh 			
				audit_trail($audit_data);
                echo json_encode($msg);
                die();
            			
            }
        }
        
    }
    Public function delete_images(Request $request)
    {

    }
}
