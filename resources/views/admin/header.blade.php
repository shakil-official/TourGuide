@if (Auth::guard('admin')->check())



<div class="container-fluid navbar">
<div id="wrapper">
  <div id="crud">
       <!-- Sidebar -->
       <div id="sidebar-wrapper">
           <ul class="sidebar-nav">
               <li class="sidebar-brand">
                   <a href="{{ route('indexpage') }}">
                      Tour Guide
                   </a>
               </li>


               <li>
                   <a href="{{ URL::route("addplace") }}">Add Place</a>
               </li>
               <li>
                   <a href="{{ route('admin.placetype.placeTypes') }}">Place Types</a>
               </li>
               <li>
                   <a href="{{  URL::route('post') }}">Post</a>
               </li>
               <li>
                   <a href="{{ URL::route("postview") }}">View Post</a>
               </li>

               <li>
                   <a href="{{ route('provider') }}">Provider</a>
               </li>

               <li>
                   <a href="{{ route('service') }}">Service</a>
               </li>
               <li>
                   <a href="{{ route('admin.hotelTypes.hoteltype') }}">Hotel Type</a>
               </li>

               <li>
                   <a href="{{ route('admin.hotel.hotel') }}">Hotel</a>
               </li>

               <li>
                   <a href="{{ route('restaurant') }}">Restaurant</a>
               </li>
               <li>
                   <a href="{{ route('admin.religion.religion') }}">Religion</a>
               </li>
               <li>
                   <a href="{{ route('market') }}">Market</a>
               </li>
               <li>
                 <a href="{{ route('admin.logout') }}">
                     Admin Logout
                 </a>
               </li>


           </ul>
       </div>
       <!-- /#sidebar-wrapper -->

       <!-- Page Content -->
       <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Menu</a>

                    </div>
                </div>
				<!-- row end -->

				 <div class="container-fluid">
  					<div class="row main-bolck-setting">
  							 <div id="crud" class="row">
                  	<div class="col-xs-12">

                      @else
                          <script>window.location = "/admin/login";</script>

                       @endif
