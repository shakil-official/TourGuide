@extends('app')

@section('content')
	@include('admin.header')
		<div class="container">
	 				<div class="row">
	 						<div class="col-xs-6 col-sm-offset-3">


								<div class="panel panel-default">
								  <!-- Default panel contents -->
								  <div class="panel-heading text-center">Provider</div>
								  <div class="panel-body">



									<form  method="post" action = "{{ route('providerUpdate') }}">
												<div class="form-group">
													 
													 <input type="text" name="providerName" value="{{$provider->service_provider}}" class="form-control">
													 <div class="modal-footer">
														<input type="submit" class="btn btn-primary" value="Submit">
														<input type="hidden" value="{{ Session::token() }}" name="_token">
														<input type="hidden" value="{{ $provider->id }}" name="id">
													</div>
												</div>
											</div>
										</div>
								</form>
									  </div>

								</div>




@endsection
