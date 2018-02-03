@extends('app')
@section('content')
  @include('admin.header')


 <div class="col-md-12">
  {{-- <h5 class=" text-primary" >   </h5> --}}



    <div class="row">
      <div class="col-md-11 col-md-offset-1">

        <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading text-center">Insert Place information</div>
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
<br/>



  <!-- Table -->









  <form class="form-horizontal" method="post" action="{{ URL::route('singlepostupdate')  }}" enctype="multipart/form-data" >
      {{ csrf_field() }}
    <div class="form-group">
      <label for="exampleInputEmail1" class="col-sm-2">Title</label>
      <div class="col-sm-10">
        <input type="text" class="form-control input-sm" name="title" id="title" value="{{ $post->title}}" required>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1" class="col-sm-2">Description</label>
      <div class="col-sm-10">
        <textarea rows="4" cols="50" id="description" name="description" style="margin: 0px; width: 539px; height: 88px;" required>{{ $post->description}}</textarea>
      </div>
    </div>

    <!--    -->

    <div class="form-group">
      <label for="exampleInputEmail1" class="col-sm-2">Address</label>
      <div class="col-sm-10">
        <textarea  rows="4" cols="50" id="address" name="address" style="margin: 0px; width: 539px; height: 88px;" required>{{ $post->address}}</textarea>
      </div>
    </div>

    <!--   -->

    <div class="form-group">
      <label for="exampleInputEmail1" class="col-sm-2">Place</label>
      <div class="col-sm-10">
        <select id = "" name = "place" class="form-control input-sm">

          @foreach ($places as $place)
            @if (App\Visitinformation::where('place_id',$place->id)->where('id',$post->id)->count() > 0)
              <option selected="selected">  {{ $place->placeName }}</option>
            @else
              <option>  {{ $place->placeName }}</option>
            @endif
          @endforeach

        </select>
      </div>
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1" class="col-sm-2">Type   </label>
      <div class="col-sm-10">
        <select class="js-example-basic-multiple  form-control input-sm" multidata="{{$post->id}}" name="types[]" multiple="multiple" required>




          @foreach ($placetypes as $placetype)

            @if ($post->placeType()->where('visitinformation_id',$post->id)->where('placetype_id', $placetype->id )->count() > 0)
            <option selected="selected"  value={{$placetype->id}}>  {{$placetype->place_type_name }}</option>
            @else
              <option  value={{$placetype->id}}>  {{ $placetype->place_type_name }}</option>
            @endif
          @endforeach


        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="exampleInputFile" class="col-sm-2">File input</label>
      <input type="file" id = "ImageUpload" name="imager_update[]" multiple>
    </div>

    <input type="submit" class="btn btn-success col-md-offset-2">

    <input type="hidden" value="{{ Session::token() }}" name="_token">
    <input type="hidden" value="{{ $post->id }}" name="id">
  </form>
  </div>
  </div>
</div>

  </div>






</div>

@endsection
