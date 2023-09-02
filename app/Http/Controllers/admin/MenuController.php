<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        
        $title="Menu List";
        $whEre  = "";
      
        $pid= clean_single_input($request->id);
        $langid= clean_single_input($request->id);
        $approve_status= clean_single_input($request->status);
        // if($approve_status){
		// 		$whEre['approve_status'] = $approve_status;
		// }else{
		// 		$whEre['approve_status'] = '3';
		// }
		// if($langid){
		// 		$whEre['language_id'] = $langid;
		// }else{
		// 		$whEre['language_id'] = '1';
		// }
        $langid=!empty($langid)?$langid:1;
       
		$list = Menu::paginate(10);
         return view('admin/menus/menu',compact(['list','langid','title']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Menu";
        
        return view('admin/menus/add_menu',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): mixed {
        
       
        $rules = array(
            'menu_title' => 'required',
            'url' => 'required',
            'language' => 'required',
            'menutype' => 'required',
            'txtpostion' => 'required',
            'txtstatus' => 'required',
            'welcomedescription' => 'required'
        );
       
        if($request->menutype == 1){
            $rules = array(
                'description' => 'required',
                'metakeyword' => 'required',
                'metadescription' => 'required'
            );
            
            $validator = Validator::make($request->all(), $rules);
		}elseif($request->menutype == 2){
			// if (empty($request->txtuplode)){
			// 	if(!isset($_POST['m_id'])){
                  
                    $rules = array(
                        'txtuplode' => 'required'
                    );
                    $validator = Validator::make($request->all(), $rules);
			// 	}
			// }
		}elseif($request->menutype == 3){
            $rules = array(
                'txtweblink' => 'required'
            );
			   
            $validator = Validator::make($request->all(), $rules);
        }else{
            $validator = Validator::make($request->all(), $rules);
        }
        
		
		
		if(isset($_POST['m_id']) && $_POST['menutype'] == 2){
			$_POST['txtuplode'] = $_POST['pretxtuplode'];
		}else{
			$_POST['txtuplode'] = "";
		}
        if ($validator->fails()) {
      
            return redirect('admin/menu/create')->withErrors($validator)->withInput();
            
        }else{
            $user_login_id=Auth()->user()->id;
            $dataArr = array(); 
          
			//$dataArr = clean_data_array($request);  // clean posted data 
			///*
			//$pArray = array();
			$pArray['m_name']    					= $request->menu_title; 
			$pArray['m_url']  						= seo_url($request->url);
			$pArray['language_id']    			    = $request->language;
			$pArray['m_flag_id']    				= $request->menucategory;
			$pArray['m_type']  						= $request->menutype;
			$pArray['m_title']  					= $request->url;
			$pArray['m_keyword']    				= $request->metakeyword;
			$pArray['welcomedescription']  	        = $request->welcomedescription;
			$pArray['m_description']				= $request->metadescription;
			$pArray['content']    					= $request->description;
			$pArray['doc_uplode']  				    = $request->txtuplode;
			$pArray['linkstatus']    				= $request->txtweblink;
			$pArray['admin_id']  					= $user_login_id;
			$pArray['approve_status']  			    = $request->txtstatus;
			$pArray['menu_positions']  		        = $request->txtpostion;
			$pArray['current_version']  			= 0;
			
			$create 	= Menu::create($pArray);
            $lastInsertID = $create->id;
            $user_login_id=Auth()->user()->id;

            if($lastInsertID > 0){
				$audit_data = array('user_login_id'     =>  $user_login_id,
								'page_id'           	=>  $lastInsertID,
								'page_name'             =>  $request->menu_title,
								'page_action'           =>  'Insert',
								'page_category'         =>  $request->menutype,
								'lang'                  =>  $request->language,
								'page_title'        	=> 'Menu Model',
								'approve_status'        => $request->txtstatus,
								'usertype'          	=> 'Admin'
							);
							
				audit_trail($audit_data);
                return redirect('admin/menu')->with('success','Menu has successfully add');
			}
           
        }
       // return redirect('admin/menu')->with('success','Menu has successfully add');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
   
}
