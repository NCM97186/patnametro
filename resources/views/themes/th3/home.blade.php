@extends('layouts.themes') @section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <!-- <div class="mt-3 position-absolute" style="z-index: 111; bottom: 15px; left: 15px;">
        <button id="pauseButton" class="btn-xs btn-default mx-2">
          <i class="fas fa-pause"></i>
        </button>
        <button id="playButton" class="btn-xs btn-default">
          <i class="fas fa-play"></i>
        </button>
      </div> -->
    <div class="carousel-indicators">
        @if(!empty($banner)) @php $i = 0; @endphp @foreach($banner as $val)
        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$i}}" class="@if($i==0) active @endif"></li>

        @php $i++; @endphp @endforeach @endif
    </div>

    <div class="carousel-inner" style="max-height: 500px;">
        @if(!empty($banner)) @php $i = 0; @endphp @foreach($banner as $val)
        <div class="carousel-item @if($i==0) active @endif">
            <img src="{{ URL::asset('public/upload/admin/cmsfiles/banner/thumbnail/')}}/{{$val->txtuplode}}" class="d-block w-100" alt="{{$val->title}}" title="{{$val->title}}" />
        </div>
        @php $i++; @endphp @endforeach @endif
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- ----------------------Latest news Start-------------------------- -->

<div class="latest-news">
    <p class="px-3 m-0 d-flex align-items-center">{{ __('messages.whatnew') }}</p>
    <marquee bgcolor="grey" scrollamount="10">
        @foreach($whatsnew as $mods) @if($mods->menutype==2)
        <a href="{{ url('/public/upload/admin/cmsfiles/whatsnews/') }}/{{$mods->txtuplode}}" title="{{$mods->title}}"> {{$mods->title}}</a>
        @elseif($mods->menutype==3)
        <a target="_blank" href="{{$mods->txtweblink}}" title="{{$mods->title}}">{{$mods->title}}</a>

        @else
        <a href="@if($mods->page_url=='#') '' @else {{ url('/news') }}/{{$mods->page_url}} @endif" title="{{$mods->title}}"> {{$mods->title}}</a>

        @endif @endforeach
    </marquee>
</div>

<!-- ----------------------Message from MD Start-------------------------- -->

<div class="row MD justify-content-center m-0">
    <div class="col-lg-5 position-relative mt-4">
        <p class="message_MD mb-0">{{ __('messages.md_title') }}</p>
        <p class="MD_name">{{ $officer->officers_name }}</p>
        <img class="w-100" src="{{ URL::asset('public/upload/admin/cmsfiles/officers/thumbnail/')}}/{{$officer->txtuplode}}" alt="{{ $officer->officers_name }}" srcset="" />
    </div>
    <div class="col-lg-5">
        <p class="the_message w-100">
           <?php echo substr($officer->contents,0, 900); ?>
        </p>
        <a class="read_more" type="button"> {{ __('messages.read') }}</a>
       
       
        <!-- dribbble -->
       
    </div>
</div>
@php
$langid1 = session()->get('locale')??1;
@endphp
<!-- ----------------------announscement and media Start-------------------------- -->
<div class="row m-0 py-4 container-fluid">
    <div class="Announcement col-lg-6 col-12 justify-content-center d-flex">
       <div class="w-75 left_right_border">
        <p class="heading text-center px-2">{{get_title('notefications',$langid1)->title}}</p>
        <marquee direction = "up"  scrollamount="4">
            <p class="py-2 px-3">This is an example of Marquee</p>
            <p class="py-2 px-3">This is an example of Marquee</p>
            <p class="py-2 px-3">This is an example of Marquee</p>
        </marquee>
       </div>
    </div>
    <div class="col-lg-6 col-12 justify-content-center d-flex announcement-container">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/-ucUFBTUYLI?si=1fKYaNMf59bmPCmW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>
<!-- ----------------------important links Start-------------------------- -->
<div class="important_links text-center py-4">
    <p class="heading">Important Links</p>
    <div class="links d-flex w-100 justify-content-center">
        <a class="px-3" href="#"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset="">Metro Timings</a>
        <a class="px-3" href="#"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset="">FARE TABLE</a>
        <a class="px-3" href="#"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset="">TOURIST DESTINATION</a>
        <a class="px-3" href="#"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset="">TENDERS</a>
        <a class="px-3" href="#"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset="">HELP & SUPPORT</a>
    </div>
</div>

@endsection
