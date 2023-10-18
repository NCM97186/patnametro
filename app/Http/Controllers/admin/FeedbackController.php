<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Feedback;
use App\Models\admin\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\SampleMail;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Manage Feedback";
        $langid=!empty($langid)?$langid:1;
        $list = Feedback::orderBy('created_at', 'DESC')->select('*')->paginate(100);
        return view('admin/feedback/index',compact(['list','title']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $title="Reply Feedback";              
        $id=clean_single_input($id);
        $data = Feedback::find($id);
        return view('admin/feedback/reply',compact(['title','data']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id=  clean_single_input($id);
       
        $rules = array(
            'review_comment' => 'required',
       );

    $validator = Validator::make($request->all(), $rules);
       if ($validator->fails()) {
            return  back()->withErrors($validator)->withInput();
       }else{
           $user_login_id=Auth()->user()->id;
           $pArray['review_comment']    				= clean_single_input($request->review_comment); 
          
           $create 	= Feedback::where('id', $id)->update($pArray);
           $maildata = Configuration::where('cof_type', "Email")->select('sender_name','sender_mail','password')->first();
          
        //    $comment = [
        //     'subject' => clean_single_input($request->review_comment),
        //     'body' => clean_single_input($request->review_comment)
        // ];
        //    Mail::to(clean_single_input($request->sender_mail))->send(new SampleMail($comment));

           if($create > 0){
                $audit_data = array('user_login_id'     =>  $user_login_id,
                'page_id'           	=>  $id,
                'page_name'             =>  $request->review_comment,
                'page_action'           =>  'Reply',
                'page_category'         =>  "Feedback",
                'page_title'        	=> 'Reply Feedback',
                'approve_status'        => "1",
                'usertype'          	=> 'Admin'
            );
                           
               audit_trail($audit_data);
               return redirect('admin/feedback')->with('success','Reply has sent Successfully');
        }
          
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
