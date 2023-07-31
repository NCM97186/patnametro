<!DOCTYPE html>
<html lang="en">
   <head>
     @include('../includes.head');
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
             @include('../includes.sidebar');
         </div>

            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                   @include('../includes.header');
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
              
               <section id="container" class=""> 
               @yield('content')
               </section>

            
            @include('../includes.footer');
   </body>
</html>