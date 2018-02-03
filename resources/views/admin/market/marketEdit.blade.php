@extends('app')

@section('content')
	@include('admin.header')
		<div class="container">
	 				<div class="row">
	 						<div class="col-xs-10 col-sm-offset-1">


								<div class="panel panel-default">
								  <!-- Default panel contents -->
								  <div class="panel-heading text-center">Market Update</div>
								  <div class="panel-body">



								<form  method="post" action = "{{ route('marketUpdate') }}">
											<div class="form-group">
												<label for="Contact Name">Market Name</label>
								 				<input type="text" name="marketName" class="form-control input-sm"  value="{{ $market->marketName }}">
											</div>

										<div class="form-group">
											<label for="message-text" class="control-label">Address:</label>
											<textarea class="form-control" name="address" id="message-text">{{ $market->address }}</textarea>
										</div>

											<div class="form-group">
												<label for="message-text" class="control-label">Place:</label>
												<select   name = "place" class="form-control input-sm">
													@foreach ($places as $place)
														@if (App\Market::where('place_id',$place->id)->where('id',$market->id)->count() > 0)
															<option selected="selected">  {{ $place->placeName }}</option>
														@else
															<option>  {{ $place->placeName }}</option>
														@endif
													@endforeach
												</select>
											</div>

												 <div class="modal-footer">
									 				<input type="submit" class="btn btn-primary" value="Submit">
									 				<input type="hidden" value="{{ Session::token() }}" name="_token">
													<input type="hidden" value="{{ $market->id }}" name="id">
									 			</div>
											</div>
										</div>
									</div>
							</form>
						</div>
					</div>

@endsection
