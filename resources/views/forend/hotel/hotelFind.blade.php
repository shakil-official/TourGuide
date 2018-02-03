@extends('app')

@section('content')
   @include('forend.nav')


<div class="container-fluid">
  <div class="row" style="margin-top: 50px;">  {{-- main row --}}
    <div class="col-sm-12">
        {{-- Second container --}}
      <div class="container">
        {{-- search --}}
        <div class="row">

              <div class="col-sm-6 col-sm-offset-3">
                  	<form action="#" method="post" class="form-horizontal" id="hotelsSearch">

                  <div id="imaginary_container">
                    <h3 class="text-center"> Find your perfect hotel </h3>

                    <div class="modal-body">
              				<label for="hotelTitle">Place Name</label>
                      <select name="placeName" id="placeName" class="form-control input-sm">
                          @for ($i=0; $i <count($place); $i++)
                              <option> {{ $place[$i]->placeName }}</option>
                          @endfor
                      </select>
                    </div>


                      <div class="input-group stylish-input-group">

                            <input type="text" class="form-control"  placeholder="Search" id="availablehotels">
                            <span class="input-group-addon">
                                <button type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>

                      </div>
                  </div>
                    </form>
              </div>
      	</div>
        {{-- search --}}
        <div class="row" id = "hotelSearchResultSow">
           <div class="col-sm-12" id = "notFound">


          </div>

          <div class="col-sm-12">
            <div class="container-fluid">
              <div class="hotelSearchBox">


              </div>

              </div>
          </div>
        </div>


      </div>
      {{-- Second container --}}
    </div>
  </div>  {{-- main row end --}}
</div>

 





</div>
@endsection
