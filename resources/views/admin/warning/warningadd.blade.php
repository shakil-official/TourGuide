


	<form action="{{ route('warningCreate') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="modal fade" id="create">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span>&times;</span>
						</button>
						<h5  style=" ">Add Here</h5>
			</div>

			<div class="modal-body" style=" ">
				<label for="title Name">title</label>
				<input type="text" name="title" class="form-control input-sm">

			</div>


			<div class="modal-body" style=" ">
				<label for="message-text" class="control-label">Description:</label>
				<textarea class="form-control" name="description" id="message-text"></textarea>
			</div>

		<div class="modal-body" style=" ">
			<label for="" class=" ">Warning Type</label>
				<select id = "" name = "warningType" class="form-control input-sm">

							<option> Rain </option>
							<option> Hot </option>

			</select>
			</div>

		<div class="modal-body" style=" ">
			<label for="" class="col-sm-2">Place</label>
				<select id = "" name = "place" class="form-control input-sm">
					@foreach ($places as $place)
							<option>  {{ $place->placeName }}</option>
					@endforeach
			</select>
			</div>

			<div class="modal-footer" style="margin-top: 10px;">
				<input type="submit" class="btn btn-primary" value="Submit">
				<input type="hidden" value="{{ Session::token() }}" name="_token">
			</div>
		</div>


</form>
	</div>
	</div>
