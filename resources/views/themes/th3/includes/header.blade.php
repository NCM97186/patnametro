<body id="fontSize">
<?php
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        $pageurl = $_SERVER['REQUEST_URI'];

        $ip 			= clean_single_input($ip);
        $pageurl 	= clean_single_input($pageurl);


        update_visitor_count($ip, $pageurl);
        $langid1 = session()->get('locale');
        ?>

  <!-- <header class="header_top">
        <div class="w-100 d-flex justify-content-between container-fluid px-5">
            <div class="mobile-dropdown mobile-dropdown1">
                
                <a href="#" class="dropdown-toggle dropdown-toggle1"><img style="width: 15%;" src="https://f.hubspotusercontent30.net/hubfs/2235233/blog-import/2020/20-08-Aug/sm-icons-facebook-logo.png" alt="" srcset=""></a>
                <div class="dropdown-content dropdown-content1">
                    <a href="#"><img src="https://www.iconpacks.net/icons/2/free-facebook-logo-icon-2428-thumb.png" alt="Facebook"></a>
                    <a href="#"><img src="https://assets.stickpng.com/images/580b57fcd9996e24bc43c53e.png" alt="Twitter"></a>
                    <a href="#"><img src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-instagram-icon-png-image_6315974.png" alt="Instagram"></a>
                </div>
            </div>
            <div class="gap-3 d-flex">
                <div class="mobile-dropdown mobile-dropdown2">
                
                    <a href="#" class="dropdown-toggle dropdown-toggle2"><img src="./Assets/img/theme.png" alt="" srcset=""></a>
                    <div class="dropdown-content dropdown-content2">
                        <a href="javascript:void(0)" onclick="setActiveStyleSheet('blue'); return false;"><img src="assets/images/blue.png" alt="Blue Theme" title="Blue Theme"></a>
                        <a href="javascript:void(0)" onclick="setActiveStyleSheet('outrageous_orange'); return false;"><img src="assets/images/outrageous_orange.png" class="img_width" alt="Outrageous Red" title="Outrageous Red"></a>
                    </div>
                </div>
                <a href="#">Screen Reader Access</a>
                <div class="mobile-dropdown mobile-dropdown3">
                
                    <a href="#" class="dropdown-toggle dropdown-toggle3"><img  src="./Assets/img/text-inde.png" alt="" srcset=""></a>
                    <div class="dropdown-content3 ">
                      <a id="fontincrease" href="javascript:void(0)">A+</a>
                      <a id="fontreset" href="javascript:void(0)">A</a>
                      <a id="fontdecrease" href="javascript:void(0)">A-</a>
                    </div>
                </div>
            </div>
        </div>
      </header> -->
      



<!-- ----------------------Logo header Start-------------------------- -->

<div class="container-fluid px-5 d-flex justify-content-between header_logo">
        <div >
        <a href="{{ url('/')}}"><img src="{{ URL::asset('public/upload/admin/setting/')}}/{{!empty(get_setting($langid1)->logo)?get_setting($langid1)->logo:''}}" alt="{{ !empty(get_setting($langid1)->website_name)?get_setting($langid1)->website_name:'Website Name' }}" class="w-100" title="{{ !empty(get_setting($langid1)->website_name)?get_setting($langid1)->website_name:'Website Name' }}" /></a>
            
        </div>
        <div class="gov_logo gap-4 d-flex justify-content-end">
            <img class="w-35" src="{{ URL::asset('/public/themes/th3/assets/img/Digital_India_logo.svg.png')}}" alt="" srcset="">
            <img class="w-35" src="{{ URL::asset('/public/themes/th3/assets/img/g20-logo.png')}}" alt="" srcset="">
        </div>
    </div>


<!-- ----------------------Navbar Start-------------------------- -->

    <div>
        <nav>
            <div class="navbar">
                <i class='bx bx-menu'></i>
                <div class="logo"><a href="#">Patna Metro</a></div>
                <div class="nav-links">
                    <div class="sidebar-logo">
                        <span class="logo-name">Patna Metro</span>
                        <i class='bx bx-x'></i>
                    </div>
                    <ul class="links">
                    <?php
                        $pos=[1,4];
                        $langid=session()->get('locale')??1;
                        $res= get_menu($langid,$pos,0) ; $i=1; 
                        $pageurl = clean_single_input(request()->segment(2));
                        ?>
                         
                          @foreach($res as $mod)
                        <li class="<?php if($mod->m_url== $pageurl || $mod->m_url== 'home') echo "current" ?>" >
                            @if($mod->m_type==2)
                                <a target="_blank" href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$mod->doc_uplode}}" title="{{$mod->m_name}}" > {{$mod->m_name}}</a>
                            @elseif($mod->m_type==3)
                            <a target="_blank" href="{{$mod->linkstatus}}" title="{{$mod->m_name}}" > {{$mod->m_name}}</a>
                        
                            @else
                            <a href="@if($mod->m_url=='#') '' @else {{ url('/pages') }}/{{$mod->m_url}} @endif" title="{{$mod->m_name}}" >{{$mod->m_name}}</a>
                           
                            @endif
                            <?php  
                             if(has_child($mod->id, $mod->language_id) > 0){ ?>
                            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
                            <ul class="htmlCss-sub-menu sub-menu">
                            <?php  $ress= get_menu($mod->language_id,$pos,$mod->id) ;  ?>
                            
                                @foreach($ress as $mods)
                                <?php  if(has_child($mods->id, $mods->language_id) > 0){ ?>
                                    <li class="more">
                                    <span>
                                        @if($mods->m_type==2)
                                            <a href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$mods->doc_uplode}}" title="{{$mods->m_name}}" > {{$mods->m_name}}</a>
                                        @elseif($mods->m_type==3)
                                            <a target="_blank" href="{{$mods->linkstatus}}" title="{{$mods->m_name}}" >{{$mods->m_name}}</a>
                                        
                                        @else
                                        <a href="@if($mods->m_url=='#') '' @else {{ url('/pages') }}/{{$mods->m_url}} @endif" title="{{$mods->m_name}}" > {{$mods->m_name}}</a>
                                    
                                        @endif  
                                            <i class='bx bxs-chevron-right arrow more-arrow'></i>
                                        </span>
                                        <ul class="more-sub-menu sub-menu">
                                        <?php  $resss= get_menu($mods->language_id,$pos,$mods->id) ;  ?>
                                            @foreach($resss as $modss)
                                                <li> 
                                                    @if($mods->m_type==2)
                                                        <a href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$modss->doc_uplode}}" title="{{$modss->m_name}}" > {{$modss->m_name}}</a>
                                                    @elseif($mods->m_type==3)
                                                        <a target="_blank" href="{{$modss->linkstatus}}" title="{{$modss->m_name}}" >{{$modss->m_name}}</a>
                                                    
                                                    @else
                                                    <a href="@if($modss->m_url=='#') '' @else {{ url('/pages') }}/{{$modss->m_url}} @endif" title="{{$modss->m_name}}" > {{$modss->m_name}}</a>
                                                
                                                    @endif  
                                             </li>
                                            @endforeach  
                                        </ul>
                                        <?php } else { ?>
                                    <li class="<?php if($mods->m_url== $pageurl) echo "current" ?>">
                                    
                                        @if($mods->m_type==2)
                                            <a href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$mods->doc_uplode}}" title="{{$mods->m_name}}" > {{$mods->m_name}}</a>
                                        @elseif($mods->m_type==3)
                                            <a target="_blank" href="{{$mods->linkstatus}}" title="{{$mods->m_name}}" >{{$mods->m_name}}</a>
                                        
                                        @else
                                        <a href="@if($mods->m_url=='#') '' @else {{ url('/pages') }}/{{$mods->m_url}} @endif" title="{{$mods->m_name}}" > {{$mods->m_name}}</a>
                                    
                                        @endif  
                                        <?php } ?>
                                    </li>
                                @endforeach
                            </ul>
                                   <?php } ?>
                        </li>
                        <?php $i++ ; ?>
                        @endforeach
                    </ul>
                </div>
                <div class="search-box">
                    <i class='bx bx-search'></i>
                    <div class="input-box">
                        <input type="text" placeholder="Search...">
                    </div>
                </div>
            </div>
        </nav>
    </div>

   