<?php

namespace App\Http\Controllers\Admin;
use App\Models\admin\Videogallerys;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            //'txtuplode'=>'mimes:wmv|pdf|mp4|avi|mov|max:300024',
            'txtuplode' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf|max:1024'
            

        ]);

        if($request->hasFile('txtuplode')){
            $filenameWithExt= $request->file('txtuplode')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('txtuplode')->getClientOriginalExtension();
            $fileNameToStore = $filename. '_'.time().'.'.$extension;
            $path = $request->file('txtuplode')->storeAs('upload\admin\cmsfiles\video/',$fileNameToStore);
        }
         $txtuplode = new Videogallerys;
         $txtuplode->title = $request->input('title');
         $txtuplode->language = $request->input('language');
         $txtuplode->txtstatus = $request->input('txtstatus');
         $txtuplodefile = $fileNameToStore;
         $txtuplode->save();

        return back()->with('success', ' Upload Successfull');

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
