@extends('app')

@section('content')

	<div class="container">
 				<div class="row">
 						<div class="col-xs-6">
							<h4>Country Edit </h4>
	<form  method="post" action = "{{ route('admin.place.placeupdate') }}">
				<div class="form-group">
					 <label for="placeName">Place</label>
					 <input type="text" name="placeName" value="{{ $place->placeName}}" class="form-control">
					 <div class="modal-footer">
		 				<input type="submit" class="btn btn-primary" value="Submit">
		 				<input type="hidden" value="{{ Session::token() }}" name="_token">
						<input type="hidden" value="{{ $place->id }}" name="id">
		 			</div>
				</div>
			</div>
		</div>
</form>


@endsection
