

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <?php
             $langid=1;
             $res= admin_sidebar($langid) ; ?>
            <a target="_blank" href="{{ url('/')}}">{{ !empty(get_setting($langid)->website_name)?substr(get_setting($langid)->website_name,0,20):'Website Name' }} </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a target="_blank" href="{{ url('/')}}">{{ !empty(get_setting($langid)->website_short_name)?get_setting($langid)->website_short_name:'W N' }} </a>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="{{ url('/home')}}" class="nav-link"><i class="bi bi-display" aria-hidden="true"></i><span>Dashboard</span></a>
            </li>
           
             @foreach($res as $mod)
                @php 
                    $pro=module_permission(Auth()->user()->id);
                    $old=array();
                    if($pro){
                      $old= explode(',',$pro->module_id);
                    }
                @endphp
                @if(in_array($mod->id, $old))
                <li class="@if($mod->slug=='#') dropdown @endif">
                    <a href="@if($mod->slug=='#') '' @else {{ url('/') }}/{{$mod->slug}} @endif" class="nav-link @if($mod->slug=='#')  has-dropdown @endif"><i class="{{$mod->icons}}"></i><span>{{$mod->module_name}}</span></a>
                    @if($mod->slug=='#')
                    <ul class="dropdown-menu">
                    <?php
                        $langid=1;
                        $resch= admin_sidebar_chid($langid,$mod->id) ; ?>
                         @foreach($resch as $modch)
                         
                            <li class="@if($modch->slug=='#') dropdown @endif">
                                <a href="{{ url('/') }}/{{$modch->slug}}" class="nav-link"><i class="{{$modch->icons}}"></i><span>{{$modch->module_name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @else
                    @if(Auth::user() &&  Auth::user()->user_type == 1)
                        <li class="@if($mod->slug=='#') dropdown @endif">
                            <a href="@if($mod->slug=='#') '' @else {{ url('/') }}/{{$mod->slug}} @endif" class="nav-link @if($mod->slug=='#')  has-dropdown @endif"><i class="{{$mod->icons}}"></i><span>{{$mod->module_name}}</span></a>
                            @if($mod->slug=='#')
                            <ul class="dropdown-menu">
                            <?php
                                $langid=1;
                                $resch= admin_sidebar_chid($langid,$mod->id) ; ?>
                                @foreach($resch as $modch)
                                
                                    <li class="@if($modch->slug=='#') dropdown @endif">
                                        <a href="{{ url('/') }}/{{$modch->slug}}" class="nav-link"><i class="{{$modch->icons}}"></i><span>{{$modch->module_name}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endif
                @endif
            @endforeach
                 
           
        </ul>
    </aside>
</div>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>{{$title}}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="{{ url('/admin/dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item active">{{$title}}</div>
            </div>
          </div>
          <div class="section-body">