

{{-- position fixed --}}
<div class="container" style="margin-bottom: 80px; padding-bottom:0px">




 <div id="peekaboo">
   <button type="button" class="btn btn-default" style="margin-bottom: 2%; margin-top:10%;"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;<a href="#restaurantTab">Restaurant Link</a></button>


    <button type="button" class="btn btn-default" style="margin-bottom: 2%;"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;<a href="#hotelTab">Hotel Link</a></button>


    <button type="button" class="btn btn-default" style="margin-bottom: 2%;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<a href="#eventTab">Event Link</a></button>
 </div>




  <div class="row">
    {{-- place information --}}
    <div class="col-sm-5">
      <div class="page-header" role="alert" style="   color: #03a9f4; line-height: 20px;margin-top: 50px;font-size: 1.5em;"><strong >{{ $post->title }}</strong> 	 </div>

<div class="row">
  <div class="col-sm-12 col-md-6">
    <small> Type of place </small>
<br><br>


      @foreach ($placetypes as $placetype)
        @if ($post->placeType()->where('visitinformation_id',$post->id)->where('placetype_id', $placetype->id )->count() > 0)
          <span class="text-right label label-default"
    style="background-color: #fb3377;
            margin: 1px 4px;
            padding: 1px 4px;
            text-align: center;">
            {{$placetype->place_type_name }}
          </span>
        @endif
      @endforeach
  </div>
  <div class="col-sm-12 col-md-6">

      @include('forend.singleRating.singleRating')


{{--
       <h1 style="margin-top:3%;margin-bottom:3%;font-size: 1.3em; color:  gold; "> <span class="label label-default"> Rating</span> {{$post->rating." "}} <i class="fa fa-star" aria-hidden="true" ></i></h1> --}}
  </div>

</div>

<hr>






      <div class="placeblock" style="color: #03A9F4;">
        <span class="label label-default" style="margin-right: 4px; background: #03A9F4; font-size: 0.85em;">  <small>{{ $name[0]->countryName }} </small> </span>  <span> > </span>
        <span class="label label-default" style="margin-right: 4px; background: #03A9F4; font-size: 0.85em;">  <small>{{ $name[0]->divisionName }}</small> </span> >
        <span class="label label-default  DistrictWeather" style="margin-right: 4px; background: #03A9F4; font-size: 0.85em;">  <small>{{ $name[0]->districtName }}</small> </span> >
        @foreach ($places as $place)
          @if (App\Visitinformation::where('place_id',$place->id)->where('id',$post->id)->count() > 0)

      <span class="label label-default" style="margin-right: 4px; background: #03A9F4; font-size: 0.85em;">  <small class="placeload">{{ $place->placeName }}</small> </span>

          @endif
        @endforeach
        </div>


      <br>

      <div class="alert  alert-dismissible" role="alert" style="margin-top:2%;padding-bottom: 5%;">
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
      {{-- <strong>Weather</strong> --}}
       <div class="weather" style="float: left;"></div>
                                <div class="weather-celsius" style="padding: 20px 0px 0px 0px; "></div>
      </div>

      <span style="line-height: 1px;"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<b>Address : </b>{{$post->address}}</span>








    </div>

    <div class="col-sm-7">

      <br><br><br>

      <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:480px;overflow:hidden;visibility:hidden;">
          <!-- Loading Screen -->
          <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="{{  asset('images/spin.svg')  }}" />

          </div>
          <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            @foreach(App\Photo::select('photo')->where('visitinformation_id',  $post->id)->get() as $photo)
              <div data-p="170.00">
                <img data-u="image" src="{{asset('images/'.$photo->photo)  }}" />
                <img data-u="thumb" src="{{asset('images/'.$photo->photo)  }}" />
              </div>
            @endforeach


          </div>
          <!-- Thumbnail Navigator -->
          <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
              <div data-u="slides">
                  <div data-u="prototype" class="p" style="width:190px;height:90px;">
                      <div data-u="thumbnailtemplate" class="t"></div>
                      <svg viewbox="0 0 16000 16000" class="cv">
                          <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                          <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                          <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                      </svg>
                  </div>
              </div>
          </div>
          <!-- Arrow Navigator -->
          <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:162px;left:30px;" data-scale="0.75">
              <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                  <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                  <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
              </svg>
          </div>
          <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:162px;right:30px;" data-scale="0.75">
              <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                  <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                  <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                  <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
              </svg>
          </div>
      </div>




    </div>
  </div>



  <hr>
  <div class="row">


    <div class="col-sm-5" style="margin-bottom : 12px;">
      {{-- <div  class="alert alert-info" role="alert">

       <button type="button" class="btn btn-default" style="margin-bottom: 2%;"><i class="fa fa-cutlery" aria-hidden="true"></i>&nbsp;<a href="#restaurantTab">Restaurant Link</a></button>



        <br>
        <br>

        <button type="button" class="btn btn-default" style="margin-bottom: 2%;"><i class="fa fa-bed" aria-hidden="true"></i>&nbsp;<a href="#hotelTab">Hotel Link</a></button>
            <br>
            <br>

        <button type="button" class="btn btn-default" style="margin-bottom: 2%;"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<a href="#eventTab">Event Link</a></button>




       </div> --}}
       <i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;<b>Description : </b>

         {{$post->description}}

    </div>





    <div class="col-sm-7">




            <div id="map"
                 style="width: 100%;
                 height: 361px;
                 border: 1px solid black;
                 position: relative;
                 overflow: hidden;
                 margin-top:5px;
                 margin-bottom: 5px;">
            </div>

            @if (App\Warning::where('place_id',$post->place_id)->count() > 0)
                <div class="alert alert-warning alert-dismissible" role="alert" style="margin-top:1%;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Warning!</strong>


                  @foreach ($warnings as $warning)
                    <br>
                   {{ $warning->title}} <br>
                   {{ $warning->description}} <br>
                    <span class="label label-default" style="background: red">{{ $warning->warningType}}</span>
                  @endforeach




                </div>
                  @endif

    </div>
    {{-- col-sm-7 end --}}
  </div>

</div>

  @include('forend.singleOther.singleOther')

{{-- singleRestaurent --}}
  @include('forend.singleRestaurent.singleRestaurent')
{{-- singlehotel --}}
  @include('forend.singleHotel.singleHotel')
{{-- singleEvent --}}
  @include('forend.singleEvent.singleEvent')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
