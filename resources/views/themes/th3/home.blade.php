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

@endsection
