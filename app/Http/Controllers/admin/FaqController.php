<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $title="Faq List";
        
         $list = Faq::paginate(10);
         return view('admin/faq/index',compact(['list','title']));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title="Faq List";
         return view('admin/faq/add',compact(['title']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
            'title' => 'required |max:255',
            'url' => 'required|max:255',
            'page_url'=>'required',
            'language'=>'required',
            'description'=>'required',
            'txtstatus'=>'required',

            ]);
        Faq::create([
           'title' => clean_single_input($request['title']),
           'url' => clean_single_input($request['url']),
           'page_url' => clean_single_input($request['page_url']),
           'language' => clean_single_input($request['language']),
           'description' => clean_single_input($request['description']),
           'txtstatus' => clean_single_input($request['txtstatus']),
           
           
        ]);
       
        return redirect('admin/faq')->with('success','Faq created successfully.');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
         $title=" Edit Faq";
      $list=faq::find($id);
        return view('admin.faq.edit',compact(['list','title']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
             $request->validate([
                'title' => 'required |max:255',
                'url' => 'required|max:255',
                'page_url'=>'required',
                'language'=>'required',
                'description'=>'required',
                'txtstatus'=>'required',
            
             ]);
              $faq = faq::find($id);
            $faq['title'] = clean_single_input($request['title']);
           $faq['url'] = clean_single_input($request['url']);
           $faq['page_url'] = clean_single_input($request['page_url']);
           $faq['language'] = clean_single_input($request['language']);
           $faq['description'] = clean_single_input($request['description']);
           $faq['txtstatus'] = clean_single_input($request['txtstatus']);
           $faq->save();
              return redirect('admin/faq')->with('success','faq updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(faq $faq)
    {
        $faq->delete();
       
        return redirect('admin/faq')->with('success','faq deleted successfully');
    }
}
