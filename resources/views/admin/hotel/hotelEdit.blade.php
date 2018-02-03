@extends('app')

@section('content')
    @include('admin.header')
	<div class="container">
<br>
 				<div class="row">
 						<div class="col-md-offset-2 col-xs-8">
							{{-- <h4 class="text-center">Hotel Edit </h4> --}}

							<div class="panel panel-default">
							  <!-- Default panel contents -->
							  <div class="panel-heading text-center">Hotel Edit</div>
							  <div class="panel-body">
										<form  method="post" action = "{{ route('admin.hotel.hotelupdate') }}" enctype="multipart/form-data">
													<div class="form-group">

									          <div class="modal-body">
									            <label for="hotelName">Hotel</label>
									            <input type="text" name="hotelName" value="{{ $hotel->hotelName}}" class="form-control">
									          </div>

									           <div class="modal-body">
									             <label for="hotelTitle">Hotel Title</label>
									             <input type="text" name="hotelTitle" value="{{ $hotel->hotelTitle}}" class="form-control">
									             <span  class="text-danger"></span>
									           </div>
                             <div class="modal-body">
                              <label for="hotelTitle">Address</label>
                              <textarea class="form-control input-sm"  name="address" rows="3">{{ $hotel->address}}</textarea>

                             </div>

									           <div class="modal-body">
									            <label for="address">Website</label>
									             <input type="text" name="website" class="form-control input-sm"  value="{{ $hotel->website}}">
									           </div>

									           <div class="modal-body">
									            <label for="">Place Name</label>
									             <select name="placeName" class="form-control input-sm">
									                   <option> {{ $p->placeName }} </option>
									                     <option>
									                       @foreach (App\Place::all() as $c)
									                           @if ($c->id != $hotel->place_id )
									                            {{$c->placeName}}
									                           @endif
									                       @endforeach
									                     </option>
									              </select>


									           </div>

                             <div class="modal-body">
                              <label for="exampleInputFile">File input</label>
                               <input type="file" id="file" name="image-file">
                           </div>

														 <div class="modal-footer">
											 				<input type="submit" class="btn btn-primary" value="Submit">
											 				<input type="hidden" value="{{ Session::token() }}" name="_token">
															<input type="hidden" value="{{ $hotel->id }}" name="id">
											 			</div>
													</div>
									        </form>

			</div>
		</div>


			</div>
		</div>



@endsection
