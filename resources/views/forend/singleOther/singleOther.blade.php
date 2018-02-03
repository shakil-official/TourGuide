<hr>
<div class="container" style="margin-top:0px;">
  <div class="row" id="">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-12 col-md-6">
              <h1 style="margin-top: 2px; text-transform: capitalize;">Review</h1>
          <div id="fb-root"></div>
              <script>
              ( function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=559199644422910';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
              <div class="fb-comments" data-href="http://localhost:8000/singlepage/{{ $post->id }}" data-numposts="5"></div>

        </div>
        <div class="col-sm-12 col-md-6">
          <div class="top-visitor-side">
            <h4 class="top-visitor-side-title">Top Rating</h4>
             <hr />
              <div class="holderRating"></div>

                 <div id="content" class="defaults" class="col-lg-8">
                   <ul id="itemContainerRating">
                     @for ($i=0; $i < count($max); $i++)
                       <div class="media">
                         <div class="media-left media-top side-border-change">
                          @if (App\Photo::select('photo')->where('visitinformation_id',  $max[$i]->id)->count())
                            @foreach(App\Photo::select('photo')->where('visitinformation_id',   $max[$i]->id)->get() as $photo)
                              <a href="{{ URL::to('singlepage/'.$max[$i]->id) }}">
                                <img class="media-object" src="{{  asset('images/'.$photo->photo)  }}" alt=" " style="width:64px;height:64px">
                              </a>
                          @break
                          @endforeach
                          @endif

                        </div>
                        <div class="media-body">
                          <a href="{{ URL::to('singlepage/'.$max[$i]->id) }}"><h6 class="media-heading">    {{ $max[$i]->title }} </h6></a>
                          <div   class="starrr" id="star" data-rating={{ $max[$i]->rating }}></div>
                        </div>
                      </div>
                   @endfor
                   </ul>
                 </div>
        </div>
        </div>

      </div>
      </div>
    </div>
</div>
