@extends('app')

@section('content')
	@include('admin.header')
	<div class="container">
 				<div class="row">
 						<div class="col-xs-8 col-sm-offset-2">
							{{-- <h4>Hotel Type Edit </h4> --}}
							<div class="panel panel-default">
							  <!-- Default panel contents -->
							  <div class="panel-heading text-center">Hotel Type Edit</div>
							  <div class="panel-body">
									<form  method="post" action = "{{ route('admin.hotelTypes.hoteltypeupdate') }}">
												<div class="form-group">
													 <input type="text" name="hoteltypeName" value="{{ $hotelType->hotel_types_Name }}" class="form-control">
													 <div class="modal-footer">
										 				<input type="submit" class="btn btn-primary" value="Submit">
										 				<input type="hidden" value="{{ Session::token() }}" name="_token">
														<input type="hidden" value="{{ $hotelType->id }}" name="id">
										 			</div>
												</div>
											</div>
										</div>
								</form>
							</div>
						</div>

@endsection
