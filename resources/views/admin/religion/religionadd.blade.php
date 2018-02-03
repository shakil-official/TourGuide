<form action="{{ route('admin.religion.religionCreate') }}" method="post" enctype="multipart/form-data">
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
				<label for="religion">Religion</label>
				<input type="text" name="religion_name" class="form-control">
				<span  class="text-danger"></span>
			</div>

      <div class="modal-body">
        <label for="hotelTitle">Place Name</label>
        <select name="placeName" class="form-control input-sm">
            @for ($i=0; $i <count($place); $i++)
                <option> {{ $place[$i]->placeName }}</option>
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
