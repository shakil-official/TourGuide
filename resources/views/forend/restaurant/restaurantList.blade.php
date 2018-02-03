@extends('app')

@section('content')
   @include('forend.nav')



  <section id="about" class="container content-section text-center">

    <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading">  {{ $restaurantList->name }}</div>
                <div class="panel-body">
                  <img src=" {{   asset('images/'.$restaurantList->image)  }}" alt="A country's touristy" class="img-responsive"                   style="width:250px;height:150.25px;margin: auto;">
                    <div class="singleHotelTitle"  style="padding: 5px;   margin:  2px;">
                         {{-- {{ $restaurantList->description }} --}}
                    </div>

                    <div class="singleHoteltype" style="padding:5px; margin: 6px 2px 6px 2px;">

                      @foreach (App\Place::where('id',$restaurantList->place_id )->get() as $c)
                        <span class="label label-default" style="margin-right: 5px; font-size: 0.92em;background: #2196F3;color: #f7f7f7;"> {{$c->placeName}}   </span>
                      @endforeach


                    </div>

                    <div class="singleHoteladdress" style="padding: 5px; margin: 6px 2px 6px 2px;">
                                {{ $restaurantList->address }}
                    </div>


                    <div class="singleHotelwebsite" style=" padding:  5px; margin: 6px 2px 6px 2px;">
                      <a href="//{{$restaurantList->website}}" target="_blank">
                        <span class="text-right label label-default"
                 style="background-color:#3c4b76;
                        margin: 1px 4px;
                        padding: 1px 4px;
                        text-align: center;
                       font-size: 0.92em;background: #2196F3;color: #f7f7f7;
                        ">
                        <i class="fa fa-globe" aria-hidden="true"></i> Web Site
                      </span></a>

                    </div>

              </div>
          </div>
        </div>
    </div> <!-- row end -->


<div class="row">
  <div class="holder"></div>

<div id="content" class="defaults" class="col-lg-8">
  <ul id="itemContainer">
    @for ($i=0; $i <count($restaurant); $i++)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
          <li style="list-style: none;">
            <img src=" {{   asset('images/'.$restaurant[$i]->image)  }}"
                 class="img-responsive"
                 style="width:250px;height:150.25px;margin: auto;">
          </li>
          <div class="caption">
            <br />
            <h5 style="margin-bottom: 11px;">{{ substr($restaurant[$i]->name,0,35)."..." }}</h5>
            <small style="color: #c1972e;"> {{ substr($restaurant[$i]->description,0,25)."..."  }}  </small>
            <hr />
            <small class="font" style="overflow-wrap: break-word;">{{ substr($restaurant[$i]->address,0,50)."..."  }} </small>
          </div>
          <a href="{{ URL::to('restaurantList/'.$restaurant[$i]->id) }}" class="btn read-more-green btn-sm"> Read More   </a>
        </div>
      </div>
    @endfor
    </ul>
  </div> <!--! end of #content -->
</div>
</div>

















{{-- <pre> --}}


{{-- {

@foreach ($restaurantList as $restaurantList)
  {{ $restaurantList->hotelName }}
  {{ $restaurantList->hotelTitle }}
  {{ $restaurantList->website }}
  {{ $restaurantList->address }}
  {{ $restaurantList->hoteltype_id }}
  {{ $restaurantList->place_id }}
@endforeach --}}



{{-- </pre> --}}



  </section>


     </div>
  @endsection
