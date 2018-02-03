@extends('app')
@section('content')
  @include('admin.header')


 <div class="col-md-12">
  {{-- <h5 class=" text-primary" >   </h5> --}}



    <div class="row">
      <div class="col-md-11 col-md-offset-1">

        <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading text-center">Place Information view</div>
  <div class="panel-body">

    @if (App\Photo::select('photo')->where('visitinformation_id',  $post->id)->count() > 2 )
      <ul id="flexiselDemo3">
        @foreach(App\Photo::select('photo')->where('visitinformation_id',  $post->id)->get() as $photo)
             <li>
               <img  class="img-responsive"
                    alt="Responsive image"
                    style="width: 130px;height: 110px;float: left;margin-left: 150px;margin-top: 6px;padding: 2px;border: 2px solid;border-color: #656565;"
                    src=" {{   asset('images/'.$photo->photo)  }}">

              </li>
            @endforeach
        </ul>
    @else
      @foreach(App\Photo::select('photo')->where('visitinformation_id',  $post->id)->get() as $photo)
        {{ $photo->id  }}
        <img  class="img-responsive"
              alt="Responsive image"
              style="width: 130px;height: 110px;margin: auto;"
              src=" {{   asset('images/'.$photo->photo)  }}">
              @break
      @endforeach
    @endif
  </div>
</div>




<div class="panel panel-default">

<br>
 <p class="list-group-item-text
            text-primary
            text-center
            text-capitalize"
            data-toggle="tooltip"
            data-placement="top"
            title="Tooltip on top">{{ $post->title}}</p>
 <div class="panel-body">
   <p>{{$post->description}} </p>
 </div>

 <!-- List group -->
 <ul class="list-group">
   @foreach ($places as $place)
     @if (App\Visitinformation::where('place_id',$place->id)->where('id',$post->id)->count() > 0)
      <li class="list-group-item  "> <span class="label label-primary">Place</span> {{ $place->placeName }} </li>

     @endif
   @endforeach

      <li class="list-group-item  ">
<span class="label label-primary">Address  </span>
        <address>
       {{ $post->address }}
        </address>


          </li>
   <li class="list-group-item">
     @foreach ($placetypes as $placetype)

       @if ($post->placeType()->where('visitinformation_id',$post->id)->where('placetype_id', $placetype->id )->count() > 0)
             <span class="label" style="margin: 2px 5px; background: #F44336; padding-left: 7px; padding-right: 7px;">{{$placetype->place_type_name }} </span>

       @endif
     @endforeach

     </li>
     <li class="list-group-item">
       <a href="{{ URL::to('postedit/' .  $post->id) }}"
         class="btn btn-info btn-sm"> Edit <span  class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>
    </li>


 </ul>
</div>





  </div>
  </div>
</div>

  </div>






</div>

@endsection
