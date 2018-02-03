@extends('app')

@section('content')

<div id="wrapper">
  <div id="crud">
       <!-- Sidebar -->
       <div id="sidebar-wrapper">
           <ul class="sidebar-nav">
               <li class="sidebar-brand">
                   <a href="index.html">
                      Tour Guide
                   </a>
               </li>
               <li>
                   <a href="post.html">Dashboard</a>
               </li>

               <li>
                   <a href="PlaceSetting.html">Place Setting </a>
               </li>
               <li>
                    <a href="viewpost.html">Data View </a>
               </li>
               <li>
                   <a href="#">About</a>
               </li>
               <li>
                   <a href="#">Services</a>
               </li>
               <li>
                   <a href="#">Contact</a>
               </li>
       <li>
                   <a href="adminlogin.html">Log out</a>
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

				 <div class="container">
  					<div class="row main-bolck-setting">
  							 <div id="crud" class="row">
                  	<div class="col-xs-12">

      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{ Toastr::warning($error, 'Title',["progressBar" => true, "positionClass" => "toast-top-center"]) }}
        @endforeach
      @endif

      @if (Session::has('Success'))
          {{ Toastr::error(Session::get('Success'), 'Title', ["positionClass" => "toast-top-center"]) }}
    {{  Session::flush()}}
      @endif

                  	</div>



                  </div>
                  <div class="row">

									<div class="col-md-7 col-md-offset-2 ">

					<h3 class="text-center text-primary" >Insert Your Information </h3>
					<hr /><br />

          <form class="form-horizontal">

          					  <div class="form-group">
          						<label for="exampleInputEmail1" class="col-sm-2">Title</label>

          							<div class="col-sm-10">
          								  <input type="email" class="form-control input-sm" id="exampleInputEmail1" placeholder="Enter place title">
          							</div>
          					   </div>

                       <div class="form-group">
							<label for="exampleInputEmail1" class="col-sm-2">Description</label>

						<div class="col-sm-10">
							<textarea class="form-control" rows="2"></textarea>
						</div>
						</div>

            <div class="form-group">
							<label for="exampleInputEmail1" class="col-sm-2">Description</label>

						<div class="col-sm-10">
							<textarea class="form-control" rows="2"></textarea>
						</div>
						</div>

            <div class="form-group">
						<label for="exampleInputEmail1" class="col-sm-2">Country</label>

						<div class="col-sm-10">
								 <select class="form-control input-sm">
									<option>BANGLADESH</option>
									<option>Pakistan</option>
								</select>
							</div>
					  </div>

            
            </form>





              </div>
           </div>

             </div>
        </div>
       </div>
       <!-- /#page-content-wrapper -->

   </div>
@endsection
