@extends('app')

@section('content')
@include('admin.header')
	<div class="container">
 				<div class="row">
 						<div class="col-xs-7 col-xs-offset-2">


							<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading text-center">Religion Edit</div>
  <div class="panel-body">
		<form  method="post" action = "{{ route('admin.religion.religionupdate') }}">
					<div class="form-group">
						 {{-- <label for="religionName">    </label> --}}

						 <input type="text" name="religionName" value="{{$religion->religion_name}}" class="form-control">
						 <div class="modal-footer">
			 				<input type="submit" class="btn btn-primary" value="Submit">
			 				<input type="hidden" value="{{ Session::token() }}" name="_token">
							<input type="hidden" value="{{ $religion->id }}" name="id">
			 			</div>
					</div>
				</div>
			</div>
	</form>
</div>
</div>

@endsection
