@extends('app')

@section('content')
	  @include('admin.header')

	<div class="container">
 				<div class="row">
 						<div class="col-xs-7 col-sm-offset-3">
							{{-- <h4>Place Type Edit </h4> --}}

							<div class="panel panel-default">
							  <!-- Default panel contents -->
							  <div class="panel-heading text-center">Place Type</div>
							  <div class="panel-body">
								<form  method="post" action = "{{ route('admin.placetype.placetypeupdate') }}">
											<div class="form-group">
												 {{-- <label for="placeName">Place</label> --}}
												 <input type="text" name="plactypeName" value="{{ $Placetype->place_type_name }}" class="form-control">
												 <div class="modal-footer">
									 				<input type="submit" class="btn btn-primary" value="Submit">
									 				<input type="hidden" value="{{ Session::token() }}" name="_token">
													<input type="hidden" value="{{ $Placetype->id }}" name="id">
									 			</div>
											</div>
										</div>
									</div>
							</form>
					</div>
				</div>



@endsection
