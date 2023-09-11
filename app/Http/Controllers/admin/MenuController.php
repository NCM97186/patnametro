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
        $list = Menu::where('m_flag_id',0)->paginate(10);
        return view('admin/menus/menu',compact(['list','title']));
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
            'menu_title' => 'required|max:64',
            'url' => 'required|max:64',
            'language' => 'required',
            'menutype' => 'required',
            'txtpostion' => 'required',
            'txtstatus' => 'required',
            'welcomedescription' => 'required|max:120'
        );
        $validator = '';
        if($request->menutype == 1){
            $rules = array(
                'description' => 'required',
                'metakeyword' => 'required|max:64',
                'metadescription' => 'required|max:250'
            );
             
            $validator = Validator::make($request->all(), $rules);
		}elseif($request->menutype == 2){
			if (!empty($request->txtuplode)){

                if (!is_dir('public/upload/admin/cmsfiles/menus/')) {
                    mkdir('public/upload/admin/cmsfiles/menus/', 0777, TRUE);
                }
                
                    $rulesdsad = array(
                        'txtuplode' => 'required|mimes:pdf,xlx,csv|max:2048',
                    );
                    $txtuplode1 = str_replace(' ','_',clean_single_input($request->menu_title)).'menu'.'.'.$request->txtuplode->extension();  
            
                    $res= $request->txtuplode->move(public_path('upload/admin/cmsfiles/menus/'), $txtuplode1);
                    
                    
                    if($res){
                        $txtuplode1 =$txtuplode1;
                    }
                    $txtuplode2 ='upload/admin/cmsfiles//menus/'.$txtuplode1; //die();
                    
                    if (file_exists($txtuplode2)) {
                        unlink($txtuplode2);
                    }
                        $validator = Validator::make($request->all(), $rulesdsad);
			}
		}elseif($request->menutype == 3){
            $rules = array(
                'txtweblink' => 'required|max:64'
            );
			   
            $validator = Validator::make($request->all(), $rules);
        }
            $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
      
            return redirect('admin/menu/create')->withErrors($validator)->withInput();
            
        }else{
            $user_login_id=Auth()->user()->id;
            $dataArr = array(); 
            $pArray['m_name']    					= clean_single_input($request->menu_title); 
			$pArray['m_url']  						= seo_url(clean_single_input($request->url));
			$pArray['language_id']    			    = clean_single_input($request->language);
			$pArray['m_flag_id']    				= clean_single_input(!empty($request->menucategory)?$request->menucategory:0);
			$pArray['m_type']  						= clean_single_input($request->menutype);
			$pArray['m_title']  					= clean_single_input($request->url);
			$pArray['m_keyword']    				= clean_single_input($request->metakeyword);
			$pArray['welcomedescription']  	        = clean_single_input($request->welcomedescription);
			$pArray['m_description']				= clean_single_input($request->metadescription);
			$pArray['content']    					= clean_single_input($request->description);
			$pArray['doc_uplode']  				    = clean_single_input($txtuplode1);
			$pArray['linkstatus']    				= clean_single_input($request->txtweblink);
			$pArray['admin_id']  					= clean_single_input($user_login_id);
			$pArray['approve_status']  			    = clean_single_input($request->txtstatus);
			$pArray['menu_positions']  		        =clean_single_input( $request->txtpostion);
			$pArray['current_version']  			= 0;
			
			$create 	= Menu::create($pArray);
            $lastInsertID = $create->id;
            $user_login_id=Auth()->user()->id;

            if($lastInsertID > 0){
				$audit_data = array('user_login_id'     =>  $user_login_id,
								'page_id'           	=>  $lastInsertID,
								'page_name'             =>  clean_single_input($request->menu_title),
								'page_action'           =>  'Insert',
								'page_category'         =>  clean_single_input($request->menutype),
								'lang'                  =>  clean_single_input($request->language),
								'page_title'        	=> 'Menu Model',
								'approve_status'        => clean_single_input($request->txtstatus),
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
        $list = Menu::where('m_flag_id',$id)->paginate(10);
         return view('admin/menus/menu',compact(['list','title']));
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
        $id= clean_single_input($id);
        $txtuplode1 ='';
        $rules = array(
            'menu_title' => 'required|max:64',
            'url' => 'required|max:64',
            'language' => 'required',
            'menutype' => 'required',
            'txtpostion' => 'required',
            'txtstatus' => 'required',
            'welcomedescription' => 'required|max:120'
        );
        $validator = '';
        if($request->menutype == 1){
            $rules = array(
                'description' => 'required',
                'metakeyword' => 'required|max:155',
                'metadescription' => 'required|max:250'
            );
             
            $validator = Validator::make($request->all(), $rules);
		}elseif($request->menutype == 2){
			if (!empty($request->txtuplode)){

                if (!is_dir('public/upload/admin/cmsfiles/menus/')) {
                    mkdir('public/upload/admin/cmsfiles/menus/', 0777, TRUE);
                }
                
                   $rulesdsad = array(
                       'txtuplode' => 'required|mimes:pdf,xlx,csv|max:2048',
                   );
                   $txtuplode1 = str_replace(' ','_',clean_single_input($request->menu_title)).'menu'.'.'.$request->txtuplode->extension();  
           
                    $res= $request->txtuplode->move(public_path('upload/admin/cmsfiles/menus/'), $txtuplode1);
                  
                   
                    if($res){
                       $txtuplode1 =$txtuplode1;
                    }
                    $txtuplode2 ='upload/admin/cmsfiles//menus/'.$txtuplode1; //die();
                    
                    if (file_exists($txtuplode2)) {
                        unlink($txtuplode2);
                    }
                     $validator = Validator::make($request->all(), $rulesdsad);
			}else{
                $txtuplode1 =$request->olduplode;
            }
		}elseif($request->menutype == 3){
            $rules = array(
                'txtweblink' => 'required|max:64'
            );
			   
            $validator = Validator::make($request->all(), $rules);
        }
            $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
      
            return  back()->withErrors($validator)->withInput();
            
        }else{
            $user_login_id=Auth()->user()->id;
            $dataArr = array(); 
          
			$pArray['m_name']    					= clean_single_input($request->menu_title); 
			$pArray['m_url']  						= seo_url(clean_single_input($request->url));
			$pArray['language_id']    			    = clean_single_input($request->language);
			$pArray['m_flag_id']    				= clean_single_input($request->menucategory);
			$pArray['m_type']  						= clean_single_input($request->menutype);
			$pArray['m_title']  					= clean_single_input($request->url);
			$pArray['welcomedescription']  	        = clean_single_input($request->welcomedescription);


            if($request->menutype == 1){
                $pArray['doc_uplode']  				    = ''; 
                $pArray['linkstatus']    				= '';
                $pArray['content']    			        = clean_single_input($request->description); 
                $pArray['m_keyword']    			    = clean_single_input($request->metakeyword); 
                $pArray['m_description']				= clean_single_input($request->metadescription); 
             }elseif($request->menutype == 2){
                 $pArray['m_keyword']    			    = ''; 
                 $pArray['m_description']				= ''; 
                 $pArray['linkstatus']    				= ''; 
                 $pArray['content']    			        = '';
                 $pArray['doc_uplode']  				= clean_single_input($txtuplode1); 
                 
            }elseif($request->menutype == 3){
             $pArray['m_keyword']    			    = ''; 
             $pArray['m_description']				= ''; 
             $pArray['doc_uplode']    				= ''; 
             $pArray['content']    			        = '';
             $pArray['linkstatus']  				    = clean_single_input($request->txtweblink); 
            }else{
 
            }
			$pArray['admin_id']  					= $user_login_id;
			$pArray['approve_status']  			    = clean_single_input($request->txtstatus);
			$pArray['menu_positions']  		        = clean_single_input($request->txtpostion);
			$pArray['current_version']  			= 0;
			
			$create 	= Menu::where('id', $id)->update($pArray);
            $lastInsertID = $id;
            $user_login_id=Auth()->user()->id;

            if($create > 0){
				$audit_data = array('user_login_id'     =>  $user_login_id,
								'page_id'           	=>  $lastInsertID,
								'page_name'             =>  clean_single_input($request->menu_title),
								'page_action'           =>  'Update',
								'page_category'         =>  clean_single_input($request->menutype),
								'lang'                  =>  clean_single_input($request->language),
								'page_title'        	=> 'Menu Model',
								'approve_status'        => clean_single_input($request->txtstatus),
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
