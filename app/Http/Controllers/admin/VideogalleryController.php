<?php

namespace App\Http\Controllers\Admin;
use App\Models\admin\Videogallerys;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
class VideogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
          $title="Video Gallery List";
        
          $list = Videogallerys::paginate(10);
          return view('admin.videogallery.index',compact(['list','title']));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add Video Gallery ";
        return view('admin/videogallery/add',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|alpha',
            'language' => 'required',
            'txtstatus' => 'required',
             'txtuplode' => 'required',
       ],[
        'title.required'=>' Video title field is required',
        'txtuplode.required'=>'This video link required',
        'txtstatus.required'=>'Status field is required'
        ]
    );
          $user_login_id=Auth()->user()->id;
           $videogallerys=array(

            'title' => clean_single_input($request['title']),
           'language' => clean_single_input($request['language']),
           'txtstatus' => clean_single_input($request['txtstatus']),
           'txtuplode' => clean_single_input($request['txtuplode']),
           'admin_id'=> $user_login_id,

            );
         $create  = Videogallerys::create($videogallerys);
           $lastInsertID = $create->id;
           $user_login_id=Auth()->user()->id;

           if($lastInsertID > 0){
            $audit_data = array('user_login_id'     =>  $user_login_id,
            'page_id'               =>  $lastInsertID,
            'page_name'             =>  clean_single_input($request->title),
            'page_action'           =>  'Insert',
            'page_category'         =>  clean_single_input($request->txtuplode),
            'lang'                  =>  clean_single_input($request->language),
            'page_title'            => 'videogallery Model',
            'approve_status'        => clean_single_input($request->txtstatus),
            'usertype'              => 'Admin'
        );
                           
         audit_trail($audit_data);
         return redirect('admin/videogallery')->with('success','videogallery created successfully.');

        }}
        public function edit($id)
        {
        $title="Edit Video Gallery ";
        $list=videogallerys::find($id);
        return view('admin.videogallery.edit',compact(['list','title']));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $id=clean_single_input($id);
        $request->validate([
                'title' => 'required|alpha |max:255',
                'language'=>'required',
                'txtstatus'=>'required',
                'txtuplode'=>'required',
            
             ],[
              'title.required'=>' Video title field is required',
              'txtuplode.required'=>'This video link required',
              'txtstatus.required'=>'Status field is required'
              ]);
            $user_login_id=Auth()->user()->id;
            $videogallery = videogallerys::find($id);
            $videogallery['title'] = clean_single_input($request['title']);
            $videogallery['language'] = clean_single_input($request['language']);
            $videogallery['txtstatus'] = clean_single_input($request['txtstatus']);
            $videogallery['txtuplode'] = clean_single_input($request['txtuplode']);
            $videogallery['admin_id']=   $user_login_id;
           
           $videogallery->save();
           $user_login_id=Auth()->user()->id;
           if($id > 0){
            $audit_data = array('user_login_id'     =>  $user_login_id,
                    'page_id'               =>   $id,
                    'page_name'             =>  clean_single_input($request->title),
                    'page_action'           =>  'update',
                    'page_category'         =>  clean_single_input($request->txtuplode),
                    'lang'                  =>  clean_single_input($request->language),
                    'page_title'            => 'videogallery Model',
                    'approve_status'        => clean_single_input($request->txtstatus),
                    'usertype'              => 'Admin'
                );
                           
              audit_trail($audit_data);
              return redirect('admin/videogallery')->with('success','videogallery updated successfully');
    }
   }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(videogallerys $videogallerys,$id)
    {
         $videogallery = videogallerys::find($id);
         $delete= $videogallery->delete();
         if($delete > 0){
            $user_login_id=Auth()->user()->id;
            $audit_data = array('user_login_id'     =>  $user_login_id,
                            'page_id'           	=>  $videogallery->id,
                            'page_name'             =>  clean_single_input($videogallery->title),
                            'page_action'           =>  'delete',
                            'page_category'         =>  '',
                            'lang'                  =>  1,
                            'page_title'        	=> 'User  Model',
                            'approve_status'        => 1,
                            'usertype'          	=> 'Admin'
                        );
                        
            audit_trail($audit_data);
            return redirect('admin/videogallery')->with('success','videogallery deleted successfully');
        }
       
    }
}