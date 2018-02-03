@extends('app')

@section('content')
	@include('admin.header')
		<div class="container">
	 				<div class="row">
	 						<div class="col-xs-7 col-sm-offset-2">


								<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading text-center">Service</div>
  <div class="panel-body">



  <!-- Form -->
								<form  method="post" action = "{{ route('serviceUpdate') }}">
											<div class="form-group">
												<label for="Contact Name">Contact</label>
								 				<input type="text" name="contact" class="form-control input-sm"  value="{{ $service->contact }}">

												</div>
												<div class="form-group">
											 <label for="Email Name">Email</label>
											 	<input type="email" name="email" class="form-control input-sm" value="{{ $service->email }}">
													</div>
													<div class="form-group">
											 <label for="website Name">website</label>
											 	<input type="text" name="website" class="form-control input-sm" value="{{ $service->website }}">
												</div>
												<div class="form-group">
											 <label for="message-text" class="control-label">Address:</label>
											 	<textarea class="form-control" name="address" id="message-text">{{ $service->address }}</textarea>
											</div>

											<div class="form-group">
												 <label for="message-text" class="control-label">Place Name:</label>
												<select id = "" name = "place" class="form-control input-sm">
													@foreach ($places as $place)
														@if (App\ServiceContact::where('place_id',$place->id)->where('id',$service->id)->count() > 0)
															<option selected="selected">  {{ $place->placeName }}</option>
														@else
															<option>  {{ $place->placeName }}</option>
														@endif
													@endforeach
												</select>
											</div>

											<div class="form-group">
												<label for="message-text" class="control-label">Provider Name:</label>
												<select id = "" name = "provider" class="form-control input-sm">
													@foreach ($providers as $provider)

														@if (App\ServiceContact::where('provider_id',$provider->id)->where('id',$service->id)->count() > 0)
															<option selected="selected">  {{ $provider->service_provider }}</option>
														@else
															<option> 	{{$provider->service_provider }}</option>
														@endif
													@endforeach
												</select>
											</div>


												 <div class="modal-footer">
									 				<input type="submit" class="btn btn-primary" value="Submit">
									 				<input type="hidden" value="{{ Session::token() }}" name="_token">
													<input type="hidden" value="{{ $service->id }}" name="id">
									 			</div>
											</div>
										</div>
									</div>
							</form>
							  </div>
							</div>
@endsection
