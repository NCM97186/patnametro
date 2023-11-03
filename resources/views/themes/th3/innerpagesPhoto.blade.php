@extends('layouts.themes') @section('content') @include("../themes.th3.includes.breadcrumb") @php $pageurl = clean_single_input(request()->segment(2)); $langid1 = session()->get('locale')??1; @endphp

<!--************************breadcrumb********************-->

<!--**********************************mid part******************-->


<div class="row inner_page">
    <div class="sidebar flex-shrink-0 col-md-2 col-xs-12 p-3">
        @include("../themes.th3.includes.sidebar")
    </div>


<!-- Name: Kesh Kumar
Date: 02-11-23
Reason: This modal is dymically change the image.  -->

    <div class="col-lg-9 col-md-9">
        <div class="content-div px-3"></div>
        <div class="d-flex gap-2">
            <?php foreach ($data as $val) { 
               $images =  explode(",",$val->txtuplode);
              ?>
            <div class="card">
            <img style="aspect-ratio:4/2.5"
                src="{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[0] ; ?>"
                alt="Image 1"
                class="image"
                onclick="openModal('{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[0] ; ?>', [<?php for ($i=0; $i <count($images) ; $i++) { ?>'{{ URL::asset('public/upload/admin/cmsfiles/photos/thumbnail/')}}/<?php echo $images[$i] ; ?>',<?php } ?>])">
        
                <div class="category">{{ $val->title??''}}</div>
                <!-- <h5>A heading that must span over two lines</h5> -->
            </div>
            <?php }?>
            
        </div>

        <span class="page-updated-date px-3 text-align-right">{{get_title('lastupdate',$langid1)->title}}: {{ get_last_updated_date($title) }} </span>
    </div>
</div>
<div>


<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="img01" />
    <button class="slideshow-button" onclick="nextSlide()">Next</button>
</div>


@endsection
