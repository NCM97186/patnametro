<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Logo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Image;
class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
          $title="Logo List";
        
         $list = Logo::paginate(10);
         return view('admin/logos/index',compact(['list','title']));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Logo ";
        return view('admin/Logos/add',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $txtuplode ='';
        $rules = array(
            'menu_title' => 'required',
            'logo_url' => 'required',
            'txtstatus' => 'required',
            'txtuplode' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
        );
         $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
      
            return redirect('admin/logo/create')->withErrors($validator)->withInput();
            
        }else{
            
            if (!is_dir('public/upload/admin/cmsfiles/logo/')) {
                mkdir('public/upload/admin/cmsfiles/logo/', 0777, TRUE);
            }
            if (!is_dir('public/upload/admin/cmsfiles/logo/thumbnail/')) {
                mkdir('public/upload/admin/cmsfiles/logo/thumbnail/', 0777, TRUE);
            }
            if(!empty($request->txtuplode)){

                $txtuplode = str_replace(' ','_',clean_single_input($request->menu_title)).'_logo'.'.'.$request->txtuplode->extension();  
                $image = $request->file('txtuplode');
                $destinationPathThumbnail = public_path('upload/admin/cmsfiles/logo/thumbnail');
                $img = Image::make($image->path());
                $img->resize(1350, 380, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail.'/'.$txtuplode);
             
                $destinationPath = public_path('upload/admin/cmsfiles/logo/');
                $image->move($destinationPath, $txtuplode);

                $txtuplode1 ='upload/admin/cmsfiles//logo/'.$txtuplode; //die();
                
                if (file_exists($txtuplode1)) {
                    unlink($txtuplode);
                }
                $thumbnail1 ='upload/admin/cmsfiles//logo/'.$destinationPathThumbnail; //die();
                
                if (file_exists($thumbnail1)) {
                    unlink($destinationPathThumbnail);
                }
            }
            
            $user_login_id=Auth()->user()->id;
            $dataArr = array(); 
            $pArray['title']                        = clean_single_input($request->menu_title); 
            $pArray['logo_url']                     = clean_single_input($request->logo_url); 
            $pArray['txtuplode']                    = $txtuplode;
            $pArray['admin_id']                     = $user_login_id;
            $pArray['txtstatus']                    = clean_single_input($request->txtstatus);
            
            
            $create     = Logo::create($pArray);
            $lastInsertID = $create->id;
            $user_login_id=Auth()->user()->id;

            if($lastInsertID > 0){
                $audit_data = array('user_login_id'     =>  $user_login_id,
                                'page_id'               =>  $lastInsertID,
                                'page_name'             =>  clean_single_input($request->menu_title),
                                'page_action'           =>  'Insert',
                                'page_category'         =>  '',
                                'lang'                  =>  1,
                                'page_title'            => 'Logo Model',
                                'approve_status'        => clean_single_input($request->txtstatus),
                                'usertype'              => 'Admin'
                            );
                            
                audit_trail($audit_data);
                return redirect('admin/logo')->with('success','Logo has successfully added');
            }
           
        }
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
        $title="Edit Logo ";
        $id=clean_single_input($id);
        $data = Logo::find($id);
        return view('admin/logos/edit',compact(['title','data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = '';
        $id=clean_single_input($id);
        $txtuplode ='';
        $rules = array(
            'menu_title' => 'required',
            'logo_url' => 'required',
            'txtstatus' => 'required'
        );
        if(!empty($request->txtuplode)){
            $rules = array(
                'txtuplode' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
                
            );
            $validator = Validator::make($request->all(), $rules);

        }else{
            $validator = Validator::make($request->all(), $rules);
        }
        
        
        if ($validator->fails()) {
            
            return  back()->withErrors($validator)->withInput();
            
        }else{
            
            if (!is_dir('public/upload/admin/cmsfiles/logo/')) {
                mkdir('public/upload/admin/cmsfiles/logo/', 0777, TRUE);
            }
            if (!is_dir('public/upload/admin/cmsfiles/logo/thumbnail/')) {
                mkdir('public/upload/admin/cmsfiles/logo/thumbnail/', 0777, TRUE);
            }
            if(!empty($request->txtuplode)){
                $txtuplode = str_replace(' ','_',clean_single_input($request->menu_title)).'_logo'.'.'.$request->txtuplode->extension();  
                $image = $request->file('txtuplode');
                $destinationPathThumbnail = public_path('upload/admin/cmsfiles/logo/thumbnail');
                $img = Image::make($image->path());
                $img->resize(1350, 380, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPathThumbnail.'/'.$txtuplode);
             
                $destinationPath = public_path('upload/admin/cmsfiles/logo/');
              
                $image->move($destinationPath, $txtuplode);

                $txtuplode1 ='upload/admin/cmsfiles//logo/'.$txtuplode; //die();
                
                if (file_exists($txtuplode1)) {
                    unlink($txtuplode1);
                }
                $thumbnail1 ='upload/admin/cmsfiles//logo/'.$destinationPathThumbnail; //die();
                
                if (file_exists($thumbnail1)) {
                    unlink($destinationPathThumbnail);
                }
            }else{
                $oldimg=$request->oldimg;
            }
           
            $user_login_id=Auth()->user()->id;
            $dataArr = array(); 
            $pArray['title']                        = clean_single_input($request->menu_title); 
            $pArray['logo_url']                     = clean_single_input($request->logo_url); 
            $pArray['txtuplode']                    = !empty($txtuplode)?$txtuplode:$oldimg;
            $pArray['admin_id']                     = $user_login_id;
            $pArray['txtstatus']                    = clean_single_input($request->txtstatus);

            $create     = Logo::where('id', $id)->update($pArray);
            if($create > 0){
                $audit_data = array('user_login_id'     =>  $user_login_id,
                                'page_id'               =>  $id,
                                'page_name'             =>  clean_single_input($request->menu_title),
                                'page_action'           =>  'Update',
                                'page_category'         =>  '',
                                'lang'                  =>  1,
                                'page_title'            => 'Logo Model',
                                'approve_status'        => clean_single_input($request->txtstatus),
                                'usertype'              => 'Admin'
                            );
                            
                audit_trail($audit_data);
                return redirect('admin/logo')->with('success','Logo has successfully Updated');
            }
           
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logo $logo)
    {
        $delete= $logo->delete();
       
        if($delete > 0){
            $user_login_id=Auth()->user()->id;
            $audit_data = array('user_login_id'     =>  $user_login_id,
                            'page_id'               =>  $logo->id,
                            'page_name'             =>  clean_single_input($logo->title),
                            'page_action'           =>  'delete',
                            'page_category'         =>  '',
                            'lang'                  =>  1,
                            'page_title'            => 'logo Model',
                            'approve_status'        => 1,
                            'usertype'              => 'Admin'
                        );
                        
            audit_trail($audit_data);
            return redirect('admin/logo')->with('success','Logo deleted successfully');
        }
       
    }
}
