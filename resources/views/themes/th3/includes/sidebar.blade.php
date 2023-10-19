@php
    $pageurl = clean_single_input(request()->segment(2));
    $langid1 = session()->get('locale')??1;
    $pos=[1,4,2];
    $langid=session()->get('locale')??1;
    $id1=!empty($m_flag_id)?$m_flag_id:$id;
    $res= get_menu($langid,$pos,$id1) ; $i=1;  
@endphp   
<ul class="list-unstyled ps-0">
    
    @foreach($res as $mod)
      <li class="mb-1 <?php if($mod->m_url== $pageurl) echo "current" ?> ">
            @if($mod->m_type==2)
            <a target="_blank" class="link-dark btn-toggle rounded collapsed" href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$mod->doc_uplode}}" title="{{$mod->m_name}}"
            > {{$mod->m_name}} </a>
            @elseif($mod->m_type==3)
            <a class="link-dark btn-toggle rounded collapsed" target="_blank" href="{{$mod->linkstatus}}" title="{{$mod->m_name}}" 
            >  {{$mod->m_name}} </a>

            @else
            <a  class="link-dark btn-toggle rounded collapsed" href="@if($mod->m_url=='#') '' @else {{ url('/pages') }}/{{$mod->m_url}} @endif" title="{{$mod->m_name}}" 

            >  {{$mod->m_name}} </a>

            @endif
        <?php  $ress= get_menu($mod->language_id,$pos,$mod->id) ;  ?>
        <?php  if(has_child($mod->id, $mod->language_id) > 0){ ?>
        <div class="collapse show" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            @foreach($ress as $mods)
                <li class="<?php if($mods->m_url== $pageurl) echo "current" ?> has-sub b">
                    @if($mods->m_type==2)
                        <a href="{{ url('/public/upload/admin/cmsfiles/menus/') }}/{{$mods->doc_uplode}}" title="{{$mods->m_name}}" > <span>{{$mods->m_name}} </span></a>
                    @elseif($mods->m_type==3)
                        <a target="_blank" href="{{$mods->linkstatus}}" title="{{$mods->m_name}}" > <span>{{$mods->m_name}} </span></a>
                    
                    @else
                    <a href="@if($mods->m_url=='#') '' @else {{ url('/pages') }}/{{$mods->m_url}} @endif" title="{{$mods->m_name}}" > <span>{{$mods->m_name}} </span></a>
                
                    @endif  
                </li>
           @endforeach
          </ul>
        </div>
        <?php } ?>
      </li>
      <?php $i++ ; ?>
    @endforeach
      
    </ul>