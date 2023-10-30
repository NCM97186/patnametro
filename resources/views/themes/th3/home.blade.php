@extends('layouts.themes') @section('content')
@php
  $langid1 = session()->get('locale')??1;
@endphp
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
            <a href="{{$val->banner_link??''}}"><img src="{{ URL::asset('public/upload/admin/cmsfiles/banner/thumbnail/')}}/{{$val->txtuplode}}" class="d-block w-100" alt="{{$val->title}}" title="{{$val->title}}" /></a>
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
    <p class="px-3 m-0 d-flex align-items-center">{{get_title('whatnew',$langid1)->title}}</p>
    <marquee bgcolor="lightgrey" scrollamount="6">
        @foreach($whatsnew as $mods) @if($mods->menutype==2)
        <a class="news_text"  target="_blank"  href="{{ url('/public/upload/admin/cmsfiles/whatsnews/') }}/{{$mods->txtuplode}}" title="{{$mods->title}}"> {{$mods->title}}</a>
        @elseif($mods->menutype==3)
        <a class="news_text" target="_blank" href="{{$mods->txtweblink}}" title="{{$mods->title}}">{{$mods->title}}</a>

        @else
        <a class="news_text" target="_blank"  href="@if($mods->page_url=='#') '' @else {{ url('/news') }}/{{$mods->page_url}} @endif" title="{{$mods->title}}"> {{$mods->title}}</a>

        @endif @endforeach
    </marquee>
</div>

<!-- ----------------------Message from MD Start-------------------------- -->

<div class="row MD justify-content-center m-0">
    <div class="col-lg-5 position-relative mt-4">
        <p class="message_MD mb-0">{{get_title('md-title',$langid1)->title}}</p>
        <p class="MD_name">{{ $officer->officers_name }}</p>
        <img class="w-100" src="{{ URL::asset('public/upload/admin/cmsfiles/officers/thumbnail/')}}/{{$officer->txtuplode}}" alt="{{ $officer->officers_name }}" srcset="" />
    </div>
    <div class="col-lg-5 justify-content-center d-flex flex-column">
        <div class="the_message w-100 px-3">
           <?php echo mb_strimwidth($officer->contents,0, 700, '...'); ?>
        </div>
        <button class="read_more my-2 mx-3"><a href="officers/{{ $officer->url }}" type="button"> {{get_title('read',$langid1)->title}} </a></button>
       
       
        <!-- dribbble -->
       
    </div>
</div>





<!-- ----------------------announscement and media Start-------------------------- -->
<div class="row m-0 py-4 container-fluid">
    <div class="Announcement col-lg-6 col-12 justify-content-center d-flex">
       <div class="w-75 left_right_border">
        <p class="heading text-center px-2">{{get_title('notefications',$langid1)->title}}</p>
        <marquee direction = "up"  scrollamount="4">
            
            @foreach($announcement as $modss) @if($modss->menutype==2)
            <p class="py-2 px-3">  <a  target="_blank"  href="{{ url('/public/upload/admin/cmsfiles/circulars/') }}/{{$modss->txtuplode}}" title="{{$modss->title}}"> {{$modss->title}}</a></p>
                @elseif($modss->menutype==3)
                <p class="py-2 px-3">   <a target="_blank" href="{{$modss->txtweblink}}" title="{{$modss->title}}">{{$modss->title}}</a></p>

                @else
                <p class="py-2 px-3">  <a  target="_blank"  href="@if($modss->page_url=='#') '' @else {{ url('/circulars') }}/{{$modss->page_url}} @endif" title="{{$modss->title}}"> {{$modss->title}}</a></p>

            @endif @endforeach
        </marquee>
       </div>
    </div>
    <div class="col-lg-6 col-12 justify-content-center d-flex announcement-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/UjY-UCjYKGU?si=3liLv84n0uCcj8r_" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>
<!-- ----------------------important links Start-------------------------- -->
<div class="important_links text-center py-4">
    <p class="heading py-3">{{get_title('important-links',$langid1)->title}} </p>
    <div class="links d-flex w-100 justify-content-center">
       
    @foreach($important as $links) @if($links->menutype==2)
            <a  class="px-3 btn22"  target="_blank"  href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$links->doc_uplode}}" title="{{$links->m_name}}"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset=""> {{$links->m_name}}</a>
                @elseif($links->menutype==3)
               <a class="px-3 btn22"  target="_blank" href="{{$links->linkstatus}}" title="{{$links->m_name}}"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset="">{{$links->m_name}}</a>
              @else
               <a class="px-3 btn22"  target="_blank"  href="@if($links->m_url=='#') '' @else {{ url('/pages') }}/{{$links->m_url}} @endif" title="{{$links->m_name}}"><img src="{{ URL::asset('/public/themes/th3/assets/img/clock.png')}}" alt="" srcset=""> {{$links->m_name}}</a>
               @endif 
        @endforeach
      
    </div>
</div>
<!-- ----------------------Map section Start-------------------------- -->
<p class="map_heading text-center py-3">{{get_title('map-route',$langid1)->title}} </p>
<div class="map_section justify-content-center d-flex">
    <div class="row m-0 container-fluid py-4">
        <div class=" map col-lg-6 col-md-6 col-12 justify-content-center d-flex">
            <img class="mw-100" src="{{ URL::asset('/public/themes/th3/assets//img/Map.png')}}" alt="">
        </div>
        <div class="col-lg-6 col-md-6 col-12 justify-content-center d-flex align-items-center">
            <div>
                <div class="py-3">
                    <p class="line_number">Line-1 (East – West Line): Danapur Cantonment – Khemni Chak</p>
                    <p class="station_number">Number of Stations: 14</p>
                    <p class="stations">Danapur Cantonment <span class="arrow_right">></span> Saguna More <span class="arrow_right">></span> RPS More <span class="arrow_right">></span> Patliputra (formerly IAS Colony) <span class="arrow_right">></span> Rukanpura <span class="arrow_right">></span> Raja Bazar <span class="arrow_right">></span> Patna Zoo (formerly JD Women’s College) <span class="arrow_right">></span> Vikas Bhawan (formerly Raj Bhavan) <span class="arrow_right">></span> Vidyut Bhawan <span class="arrow_right">></span> Patna Junction (interchange) <span class="arrow_right">></span> Mithapur <span class="arrow_right">></span> Ramkrishna Nagar & Jaganpur and Khemni Chak (interchange)</p>
                </div>
                <div class="py-3">
                    <p class="line_number">Line-2 (North – South Line): Patna Junction Railway Station – New ISBT</p>
                    <p class="station_number">Number of Stations: 12</p>
                    <p class="stations">Danapur Cantonment <span class="arrow_right">></span> Saguna More <span class="arrow_right">></span> RPS More <span class="arrow_right">></span> Patliputra (formerly IAS Colony) <span class="arrow_right">></span> Rukanpura <span class="arrow_right">></span> Raja Bazar <span class="arrow_right">></span> Patna Zoo (formerly JD Women’s College) <span class="arrow_right">></span> Vikas Bhawan (formerly Raj Bhavan) <span class="arrow_right">></span> Vidyut Bhawan <span class="arrow_right">></span> Patna Junction (interchange) <span class="arrow_right">></span> Mithapur <span class="arrow_right">></span> Ramkrishna Nagar & Jaganpur and Khemni Chak (interchange)</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
