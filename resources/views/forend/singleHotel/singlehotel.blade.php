<hr>
<div class="container" style="margin-top:0px;">
  <div class="row" id="hotelTab">
    <div class="col-sm-12">
      <h1 style="margin-top: 100px;">Hotel</h1>
      <div class="row">
        @foreach ($hotel as $h)
          @if (App\Visitinformation::where('place_id', $h->place_id)->where('id',$post->id)->count())
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="{{ asset('images/'.$h->image)  }}" alt="{{ $h->hotelName }}">
            <div class="caption" >
              <h5 class="text-center">{{ $h->hotelName }}</h5>
              <div class="alert alert-info" role="alert"><span class="label label-danger">Address </span> &nbsp;{{ $h->address }}</div>

              <p class="text-center">
                <a href="//{{$h->website}}" class="btn btn-primary" role="button">Website</a>
                <a href="{{ URL::to('hotelList/'.$h->id) }}" class="btn btn-default" role="button">Read More</a>
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
