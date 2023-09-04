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
        
         $txtuplode1 ='';
        $rules = array(
            'menu_title' => 'required',
            'url' => 'required',
            'language' => 'required',
            'menutype' => 'required',
            'txtpostion' => 'required',
            'txtstatus' => 'required',
            'welcomedescription' => 'required'
        );
        $validator = '';
        if($request->menutype == 1){
            $rules = array(
                'description' => 'required',
                'metakeyword' => 'required',
                'metadescription' => 'required'
            );
             
            $validator = Validator::make($request->all(), $rules);
		}elseif($request->menutype == 2){
			if (!empty($request->txtuplode)){

                if (!is_dir('upload/admin/cmsfiles/')) {
                    mkdir('upload/admin/cmsfiles/', 0777, TRUE);
                }

                $rules = array(
                    'txtuplode' => 'required|mimes:pdf,xlx,csv|max:2048',
                );
                $txtuplode = $request->file('txtuplode');

                $txtuplode1 = rand() . '.' . $txtuplode->getClientOriginalExtension();
                $res=  $txtuplode->move(public_path('upload/admin/cmsfiles/'), $txtuplode1);
                
                   if($res){
                    $txtuplode1 =$txtuplode1;
                   }
                   $validator = Validator::make($request->all(), $rules);
			}
		}elseif($request->menutype == 3){
            $rules = array(
                'txtweblink' => 'required'
            );
			   
            $validator = Validator::make($request->all(), $rules);
        }
            $validator = Validator::make($request->all(), $rules);
        
        
		
		
		// if(isset($_POST['m_id']) && $_POST['menutype'] == 2){
		// 	$_POST['txtuplode'] = $_POST['pretxtuplode'];
		// }else{
		// 	$_POST['txtuplode'] = "";
		// }
        if ($validator->fails()) {
      
            return redirect('admin/menu/create')->withErrors($validator)->withInput();
            
        }else{
            $user_login_id=Auth()->user()->id;
            $dataArr = array(); 
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
			$pArray['doc_uplode']  				    = $txtuplode1;
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
                return redirect('admin/menu')->with('success','Menu has successfully added');
			}
           
        }
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title="Child Menu List";
        $whEre  = "";
        
		$list = Menu::where('id',$id)->paginate(10);
       // User::where('votes', '>', 100)->paginate(15);
         return view('admin/menus/menu',compact(['list','langid','title']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title="Edit Menu";
        $data = Menu::find($id);
        return view('admin/menus/edit_menu',compact(['title','data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $txtuplode1 ='';
        $rules = array(
            'menu_title' => 'required',
            'url' => 'required',
            'language' => 'required',
            'menutype' => 'required',
            'txtpostion' => 'required',
            'txtstatus' => 'required',
            'welcomedescription' => 'required'
        );
        $validator = '';
        if($request->menutype == 1){
            $rules = array(
                'description' => 'required',
                'metakeyword' => 'required',
                'metadescription' => 'required'
            );
             
            $validator = Validator::make($request->all(), $rules);
		}elseif($request->menutype == 2){
			if (!empty($request->txtuplode)){

                // if (!is_dir('upload/admin/cmsfiles/')) {
                //     mkdir('upload/admin/cmsfiles/', 0777, TRUE);
                // }
                
                $rules = array(
                    'txtuplode' => 'required|mimes:pdf,xlx,csv|max:2048',
                );
                $txtuplode = $request->file('txtuplode');

                $txtuplode1 = rand() . '.' . $txtuplode->getClientOriginalExtension();
                $res=  $txtuplode->move(public_path('upload/admin/cmsfiles/'), $txtuplode1);
                
                   if($res){
                    $txtuplode1 =$txtuplode1;
                   }
                   $validator = Validator::make($request->all(), $rules);
			}
		}elseif($request->menutype == 3){
            $rules = array(
                'txtweblink' => 'required'
            );
			   
            $validator = Validator::make($request->all(), $rules);
        }
            $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
      
            return  back()->withErrors($validator)->withInput();
            
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
			$pArray['doc_uplode']  				    = $txtuplode1;
			$pArray['linkstatus']    				= $request->txtweblink;
			$pArray['admin_id']  					= $user_login_id;
			$pArray['approve_status']  			    = $request->txtstatus;
			$pArray['menu_positions']  		        = $request->txtpostion;
			$pArray['current_version']  			= 0;
			
			$create 	= Menu::where('id', $id)->update($pArray);
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;

            if($create > 0){
				$audit_data = array('user_login_id'     =>  $user_login_id,
								'page_id'           	=>  $lastInsertID,
								'page_name'             =>  $request->menu_title,
								'page_action'           =>  'Update',
								'page_category'         =>  $request->menutype,
								'lang'                  =>  $request->language,
								'page_title'        	=> 'Menu Model',
								'approve_status'        => $request->txtstatus,
								'usertype'          	=> 'Admin'
							);
							
				audit_trail($audit_data);
                return redirect('admin/menu')->with('success','Menu has successfully Updated');
			}
           
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
       
        return redirect('admin/menu')->with('success','Menu deleted successfully');
    }
   
}
