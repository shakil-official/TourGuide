<hr>
<div class="container" style="margin-top:0px;">
  <div class="row" id="eventTab">
    <div class="col-sm-12">
      <h1 style="margin-top: 100px;">Event</h1>
      <div class="row">

            @foreach ($event as $e)
              @if (App\Visitinformation::where('place_id', $e->place_id)->where('id',$post->id)->count())
                    <div class="col-sm-6 col-md-4" >

            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading"> <b> &nbsp;{{ $e->title }} </b></div>
              <div class="panel-body">
                <div class="alert alert-info" role="alert">
                    <span class="label label-danger">Description </span> &nbsp;
                  {{ $e->description }}
                  <br>
                  <span class="label label-danger">Address </span> &nbsp;{{ $e->address }}</div>
              </div>



              <!-- List group -->
              <ul class="list-group">
                <li class="list-group-item">  Open : &nbsp; {{ $e->open }}</li>
                <li class="list-group-item">Close : &nbsp;{{ $e->close }}</li>



              </ul>
            </div>
          </div>
        @endif
      @endforeach
      </div>
      </div>
    </div>
</div>
<br>
