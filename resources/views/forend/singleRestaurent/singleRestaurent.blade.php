<hr>
  {{-- restaurant --}}
<div class="container" style="margin-top:0px;">
  <div class="row" id="restaurantTab">
    <div class="col-sm-12">
        <h1 style="margin-top: 100px;">Restaurant</h1>
        <div class="row">
          @foreach ($restaurant as $r)
            @if (App\Visitinformation::where('place_id', $r->place_id)->where('id',$post->id)->count())
          <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
              <img src="{{ asset('images/'.$r->image)  }}" alt="{{ $r->name }}">
              <div class="caption" >
                <h5 class="text-center">{{ $r->name }}</h5>
                <div class="alert alert-success" role="alert"><span class="label label-danger">Address </span> &nbsp;{{ $r->address }}</div>

                <p class="text-center">
                  <a href="//{{$r->website}}" class="btn btn-primary" role="button">Website</a>
                  <a href="{{ URL::to('restaurantList/'.$r->id) }}" class="btn btn-default" role="button">Read More</a>
                </p>
              </div>
            </div>
          </div>
              @endif
        @endforeach
        </div>
      </div>
    </div>
</div>
