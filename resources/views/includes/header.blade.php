

                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a class="navbar-brand" href="javascript:void(0);" style="margin-left:15px; color: white;"> Welcome Super Admin( Super Admin )</a>
                           <a  style="color:white;">Welcome: {{ ucfirst(Auth()->user()->name) }}</a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <!-- <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul> -->
                              <ul class="user_profile_dd">
                                 <li>

                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user"><i class="fa fa-user fa-fw"></i>Admin</span></a>
                                    <div class="dropdown-menu">
                                    <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                    class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                                    
                                    <a href ="#">Change Password</a>
                                        
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                                   </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>