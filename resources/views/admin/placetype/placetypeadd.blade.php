<form action="{{ route('admin.placetype.placetypeCreate') }}" method="post" enctype="multipart/form-data" data-parsley-validate="">
<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h4>Add Here</h4>
			</div>
			<div class="modal-body">
				<label for="hotel_types_Name">place Type</label>
				<input type="text" name="place_types_Name" class="form-control" required="">
				<span  class="text-danger"></span>
			</div>

			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Submit">
				<input type="hidden" value="{{ Session::token() }}" name="_token">
			</div>
		</div>
	</div>
</div>
</form>
