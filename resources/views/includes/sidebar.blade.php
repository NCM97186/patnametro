  
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <!-- <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{'../assets/images/logo/logo_icon.png'}}" alt="#" /></a>
                     </div> -->
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <!-- <div class="user_img"><img class="img-responsive" src="{{'../images/layout_img/user_img.jpg'}}" alt="#" /></div> -->
                        <div class="user_info">
                           <h6>Admin</h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                 
                  <ul class=" active list-unstyled components">
                  <li class="active"><a href="{{ url('/')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Dashboard</span></a></li>
                     <li>
                     <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard fa-fw"></i> <span>Manage User </span></a>
                    <ul class="collapse list-unstyled" id="dashboard">
                     <li><a href="{{ url('/admin/user')}}"><i class="fa fa-user fa-fw"></i> <span>Users</span></a></li>
                     <li><a href="{{ url('/admin/user_role')}}"><i class="fa fa-user fa-fw"></i> <span>Manage Role</span></a></li>
                     
                     </ul>
                     </li>
                     <li><a href="{{ url('/admin/menu')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Menu</span></a></li>
                     
                     <li><a href="{{ url('/admin/minister')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Minister's Profile</span></a></li>
                     <li><a href="{{ url('/admin/circular')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Notices & Circulars</span></a></li>
                     <li><a href="{{ url('/admin/exhibition')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Exhibition & Event</span></a></li>
                     <li><a href="{{ url('/admin/publication')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Publication</span></a></li>
                     <li><a href="{{ url('/admin/tenders')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Tenders</span></a>
                     </li> <li><a href="{{ url('/admin/banner')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Banner</span></a></li>
                     <li><a href="{{ url('/admin/feedback')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Feedback</span></a></li>
                     <li>
                     <a href="#manage" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dashboard fa-fw"></i><span> Manage Discussion Forum </span></a>
                     <ul class="collapse list-unstyled" id="manage">
                     <li>
                     <a href="{{ url('/admin/discussionforum')}}"><i class="fa fa-user fa-fw"></i> <span>Discussion Forum</span></a>
                     </li>
                     <li>
                     <a href="{{ url('/admin/discussiontopics')}}"><i class="fa fa-user fa-fw"></i> <span>Manage Discussion Topics</span></a>
                     </li>
                     </ul>
                     
            <li><a href="{{ url('/admin/library_form_list')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Library Form</span></a></li>
            <li><a href="{{ url('/admin/online_suggestions_list')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Online Suggestions</span></a></li>
            <li><a href="{{ url('/admin/newedition')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage New Edition</span></a></li>
            <li><a href="{{ url('/admin/manage_logo')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage  Logo</span></a></li>
            <li><a href="{{ url('/admin/latest')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Latest Update</span></a></li>
            <li><a href="{{ url('/admin/visitor')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Visitor List</span></a></li>
            <li><a href="{{ url('/admin/photogallery')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Photo Gallery</span></a></li>
            <li><a href="{{ url('/admin/videogallery')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Video Gallery</span></a></li>
            <li><a href="{{ url('/admin/planyourvisit')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Plan Your Visit</span></a></li>
            <li><a href="{{ url('/admin/asklibrarian')}}"><i class="fa fa-dashboard fa-fw"></i> <span>Manage Ask Librarian</span></a></li>
            <li><a href="{{ url('/admin/whatsnew')}}"><i class="fa fa-dashboard fa-fw"></i> <span> Manage Whats New & Announcements</span></a></li>
                  
                  </ul>
               </div>
            </nav>