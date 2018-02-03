@extends('app')

@section('content')


  <nav class="navbar navbar-fixed-top top-nav-collapse" role="navigation">
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                  Menu <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" href="{{ route('indexpage') }}">
                  <i class="fa fa-play-circle"></i> <span class="light">Tour</span>Guide
              </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                  <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                  <li class="hidden">
                      <a href="#page-top"></a>
                  </li>
                  <li class="active">
                      <a class="page-scroll" href="">Home</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="">Hotel</a>
                  </li>
        <li>
                      <a class="page-scroll" href="">Restaurant</a>
                  </li>
                  <li>
                      <a class="page-scroll" href="">Contact</a>
                  </li>
                  <li>
                      <button class="page-scroll" href="" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>


  <div class="container"  style=" top: 0px; " >
    <div class="row">
      <div class="col-md-12">
        <h1>Search</h1>
      

        <!-- Large modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg" >Large modal</button> --}}

{{-- @include('searchBox') --}}
  @include('forend.searchBox')



      </div>
    </div>
  </div>



     </div>
  @endsection
