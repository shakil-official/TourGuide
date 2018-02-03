@extends('app')

@section('content')
	@include('admin.header')
		<div class="container">
	 				<div class="row">
	 						<div class="col-xs-8 col-sm-offset-2">


								<div class="panel panel-default">
								  <!-- Default panel contents -->
								  <div class="panel-heading">Warning Update </div>
								  <div class="panel-body">



								<form  method="post" action = "{{ route('warningUpdate') }}">
											<div class="form-group">
												<label for="Contact Name">Title</label>
								 				<input type="text" name="title" class="form-control input-sm"  value="{{ $warning->title }}">
												</div>

												<div class="form-group">
											 	<label for="message-text" class="control-label">Description :</label>
											 	<textarea class="form-control" name="description" id="message-text">{{ $warning->description }}</textarea>
											</div>

											<div class="form-group">
												<label for="Contact Name">Wrning Type</label>
												<select name="warningType" class="form-control input-sm">
													@foreach ($type as $value)
														@if ($value ==  $warning->warningType)
																	<option selected="selected">  {{ $warning->warningType }}</option>
														@else
																<option> {{ $value }} </option>
														@endif
													@endforeach
												</select>
											</div>

											<div class="form-group">
												<label for="Contact Name">Place</label>
												<select id = "" name = "place" class="form-control input-sm">
													@foreach ($places as $place)
														@if (App\Warning::where('place_id',$place->id)->where('id',$warning->id)->count() > 0)
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
													<input type="hidden" value="{{ $warning->id }}" name="id">
									 			</div>
											</div>
										</div>
									</div>
							</form>
						</div>
					</div>

@endsection
