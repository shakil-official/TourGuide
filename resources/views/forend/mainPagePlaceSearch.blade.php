@extends('app')

@section('content')
    @include('forend.nav')

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form action="{{ route('mainPagePlaceSearch') }}" method="GET" >
          <div style="margin-top: 17%; ">
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
      </div>
    </div>
  </div>






   <section id="about" class="container content-section text-center">

     {{-- <div class="row">
       <div class="col-md-6 heroSlider-fixed col-md-offset-3">

            <h5>Category <span class="label label-default">{{ $result->visitinformation()->count() }}</span></h5>
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
         <div class="prev" style=" top: 36%; ">
           <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
         </div>
         <div class="next" style=" top: 36%; ">
           <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
         </div>

       </div>
     </div> --}}





             <div class="row">
                 <div class="col-lg-12">


         <div class="row">
          <div class="holderCat"></div>

             <div id="content" class="defaults" class="col-lg-8">
               <!-- item container -->
               <ul id="itemContainerCat">


                       @foreach ($result  as $search)



                   @foreach(App\Photo::select('photo')->where('visitinformation_id',   $search->id )->get() as $photo)
                     <div class="col-sm-6 col-md-4">
                     <div class="thumbnail">
                             <li style="list-style: none;"><img src=" {{   asset('images/'.$photo->photo)  }}" alt="A country's touristy" class="img-responsive" style="width:250px;height:150.25px;margin: auto;"></li>
                         @break
                           @endforeach
                           <div class="caption">
                           <br />
                           <h5 style="margin-bottom: 11px;">{{ substr($search->title,0,35)."..." }}</h5>

                             <small style="color: #c1972e;"> {{ substr($search->address,0,25)."..."  }}  </small>

                           <hr />
                         <small class="font" style="overflow-wrap: break-word;">{{ substr($search->description,0,50)."..."  }} </small>


                             </div>
            <a   href="{{ URL::to('singlepage/'.$search->id) }}" class="btn read-more-green btn-sm"> Read More <span class=" "  ></span> </a>

                           </div>
                           </div>

                         @endforeach

               </ul>

         	  	<!-- navigation holder -->

             </div> <!--! end of #content -->

         </div>

              </div>



             </div>
   </section>



   </div>
@endsection
