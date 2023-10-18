@extends('layouts.themes')

@section('content')
@include("../themes.th3.includes.breadcrumb")
     
@php
        $pageurl = clean_single_input(request()->segment(2));
        $langid1 = session()->get('locale')??1;
@endphp 
             
<!--************************breadcrumb********************-->

<!--**********************************mid part******************-->
<div class="row inner_page">
<div class="sidebar flex-shrink-0 col-md-2 col-xs-12 p-3">
  @include("../themes.th3.includes.sidebar")
   
</div>

  <div class="col-lg-9 col-md-9">
    <div class="content-div px-3">
      
       
    </div>
<div class="d-flex gap-2">
<div class="card">
<img class="card-image w-100" src="https://www.sulasula.com/wp-content/uploads/cr_em13_14.jpg" alt="" srcset="">
    <div class="category"> Illustration </div>
    <h5> A heading that must span over two lines</h5>
</div>
<div class="card">
<img class="card-image w-100" src="https://www.sulasula.com/wp-content/uploads/cr_em13_14.jpg" alt="" srcset="">
    <div class="category"> Illustration </div>
    <h5> A heading that must span over two lines</h5>
</div>
<div class="card">
<img class="card-image w-100" src="https://www.sulasula.com/wp-content/uploads/cr_em13_14.jpg" alt="" srcset="">
    <div class="category"> Illustration </div>
    <h5> A heading that must span over two lines</h5>
</div>
</div>

    <span class="page-updated-date px-3 text-align-right">{{get_title('lastupdate',$langid1)->title}}: {{ get_last_updated_date($title) }} </span>
  </div>
</div>

@endsection
