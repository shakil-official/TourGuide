<form action="{{ route('admin.place.placeCreate') }}" method="post" enctype="multipart/form-data" data-parsley-validate="">
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
				<label for="placeName">Place</label>
				<input type="text" name="placeName" class="form-control" required="">
				<span  class="text-danger"></span>
			</div>

      <div class="modal-body">
        <label for="placeName">District</label>
        <select name="districtName" class="form-control input-sm">
            @for ($i=0; $i <count($district); $i++)
                <option>{{ $district[$i]->districtName }}</option>
            @endfor
        </select>
      </div>
			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Submit">
				<input type="hidden" value="{{ Session::token() }}" name="_token">
			</div>
		</div>
	</div>
</div>
</form>
