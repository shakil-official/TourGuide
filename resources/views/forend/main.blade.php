@extends('app')

@section('content')
<!-- Preloader Start -->
 {{-- <div class="preloader">
   <div class="rounder"></div>
  </div> --}}
  <!-- Preloader End -->


<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
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
                    <a class="page-scroll" href="{{ route('indexpage') }}" >Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ route('hotelFind') }} " >Hotel</a>
                </li>
                <li>
                    <a class="page-scroll" href="{{ route('restaurantFind') }}" >Restaurant</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<div class="intro">

<header>
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <h1 class="brand-heading">Tour Guide</h1>
<form action="{{ route('mainPagePlaceSearch') }}" method="GET" >



         <div id="imaginary_container">
          <div class="input-group stylish-input-group">
            <input type="text" class="form-control"  placeholder="Search" name="availablePlace" id="availablePlace">
            <span class="input-group-addon">

              <button type="submit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
              	<input type="hidden" value="{{ Session::token() }}" name="_token">
            </span>
          </div>
        </div>

</form>

                    <p class="intro-text">

          Make a guided tour of the latest updates and features


        </p>
                    <a  href="#about" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

</div>




<section id="about" class="container content-section text-center">

      <div class="row">
        <div class="col-md-6 heroSlider-fixed col-md-offset-3">
          {{-- <div class="overlay">
        </div> --}}
           <!-- Slider -->
             <h4 style="margin-bottom: 14px">Category</h4>
          <div class="slider responsive">

            @for ($j=0; $j <count($placetype); $j++)
              <div style="width: 285px;background: #ffffff;  ">
                <a href="{{ URL::to('catagoryShow/'.$placetype[$j]->id) }}">
                <h5 style=" background: #ff0068; padding: 12px; color: #ffffff;margin-right:5px"> {{ $placetype[$j]->place_type_name }}</h5>
                </a>
              </div>

            @endfor


          </div>
  				 <!-- control arrows -->
  				<div class="prev">
  					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  				</div>
  				<div class="next">
  					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  				</div>

        </div>
      </div>

<hr>

    <div class="row">
        <div class="col-lg-12">
           <h4 style="margin-bottom:1px; margin-top: 30px;"> Place </h4>



<div class="row">
 <div class="holder"></div>

    <div id="content" class="defaults" class="col-lg-8">
      <!-- item container -->
      <ul id="itemContainer">
        @for ($i=0; $i <count($visitinformation); $i++)
          @foreach(App\Photo::select('photo')->where('visitinformation_id',  $visitinformation[$i]->id)->get() as $photo)
            <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                    <li style="list-style: none;"><img src=" {{   asset('images/'.$photo->photo)  }}" alt="A country's touristy" class="img-responsive" style="width:250px;height:150.25px;margin: auto;"></li>
                @break
                  @endforeach
                  <div class="caption">
                  <br />
                  <h5 style="margin-bottom: 11px;">{{ substr($visitinformation[$i]->title,0,15)."..." }}</h5>

                    <small style="color: #c1972e;"> {{ substr($visitinformation[$i]->address,0,10)."..."  }}  </small>

                  <hr />
                <small class="font" style="overflow-wrap: break-word;">{{ substr($visitinformation[$i]->description,0,25)."..."  }} </small>


                    </div>
   <a   href="{{ URL::to('singlepage/'.$visitinformation[$i]->id) }}" class="btn read-more-green btn-sm"> Read More <span class=" "  ></span> </a>

                  </div>
                  </div>
               @endfor

      </ul>

	  	<!-- navigation holder -->

    </div> <!--! end of #content -->

</div>

     </div>



    </div>

</section>





<div class="container slider-product text-center">

  <div class="row">
    <div class="col-md-12">
      <h3>Photo Gallery</h3>

        <ul id="flexiselDemo3">
            @foreach(App\Photo::get() as $photo)

          <li>
            <a href=" {{ URL::to('singlepage/'.$photo->visitinformation_id) }} ">
            <img src="{{   asset('images/'.$photo->photo)  }}" class="img-responsive" alt="Responsive image" style="width:350px;height:224px;"  />
            </a>
          </li>

      @endforeach
        </ul>
    </div>
  </div>

</div>



<!-- footer stared -->

<footer class="container-fluid" id="customfooter">

  <div class="row">
      <div class="col-xs-6 col-md-4 col-md-offset-2">
        <address>
          <strong>Tour Guide </strong><br><br>
          NEUB<br><br>
         Sheikhghat - Kazirbazar Rd, Sylhet<br><br>
          <abbr title="Phone">P:</abbr> +8801781144513
        </address>
      </div>
      <div class="col-xs-6 col-md-2"></div>

      <div class="col-xs-6 col-md-4">

                  <small>FOLLOW US</small>
        <br /> <hr />
      <a href="#"><i class="fa fa-facebook fa-lg" style="color: #357ebd;" aria-hidden="true"> Facebook</i></a>
      <br />
      <br />
      <a href="#"><i class="fa fa-twitter fa-lg" style="color: #1da1f2;" aria-hidden="true"> Twitter</i></a>
      <br />
      <br /><a href="#"><i class="fa fa-google fa-lg"     style="color: #ea4335;" aria-hidden="true"> Google</i></a>
      </div>

  </div>

</footer>

<div class="container-fluid" >
  <div class="row" id="footer-2-iner-part-2">
  <div class="col-md-2 col-md-offset-10"> <br /><a href=""><i class="glyphicon glyphicon-copyright-mark" style="color: #ea4335;" aria-hidden="true"> Shakil Ahmed</i></a> </div>


  </div>
</div>



   </div>
@endsection
