<?php

namespace App\Http\Controllers\Admin;
use App\Models\admin\Videogallerys;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use video;
class VideogalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            
          $title="Videogallery List";
        
         $list = Videogallerys::paginate(10);
         return view('admin.videogallery.index',compact(['list','title']));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Add videogallery ";
        return view('admin/videogallery/add',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'title' => 'required |max:255',
            'language' => 'required|max:255',
            'txtstatus'=>'required',
            'txtuplode'=>'mimes:wmv|mp4|avi|mov|max:300024',
            

        ]);
        videogallery::create([
           'title' => clean_single_input($request['title']),
           'language' => clean_single_input($request['language']),
           'txtstatus' => clean_single_input($request['txtstatus']),
           'admin_id' => auth()->id(),
           
           
        ]);

        $file = new videogallerys();
        
           if ($request->file('video')){
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('video')->storeAs('upload\admin\cmsfiles\video', $file_name, 'public');

            $file->name = time().'_'.$request->file->getClientOriginalName();
            $file->file = '/storage/' . $file_path;
            $videogallery->update(['video' => $file_name]);
            $videogallery->update(['videoPath' => $file_path]);
    }
}
           
      

    /**
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title="Edit videogallery ";
        $id=clean_single_input($id);
        $data = videogallerys::find($id);
        return view('admin/videogallery/edit',compact(['title','data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(videogallery $videogallery)
    {
        $videogallery->delete();
       
        return redirect('admin/videogallery')->with('success','videogallery deleted successfully');
    }
}
