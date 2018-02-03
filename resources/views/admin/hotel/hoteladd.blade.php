<form action="{{ route('admin.hotel.hotelCreate') }}" method="post" enctype="multipart/form-data">
<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
				<h5>Add Here</h5>
			</div>
			<div class="modal-body">
				<label for="hotelName">Hotel Name</label>
				<input type="text" name="hotelName" class="form-control">
				<span  class="text-danger"></span>
			</div>

      <div class="modal-body">
        <label for="hotelTitle">Hotel Description</label>
        {{-- <input type="text" name="hotelTitle" class="form-control"> --}}
				<textarea class="form-control input-sm"  name="hotelTitle" rows="3"></textarea>
        <span  class="text-danger"></span>
      </div>

      <div class="modal-body">
				<label for="hotelTitle">Hotel Type</label>
        <select name="hotel_types_Name" class="form-control input-sm">
            @for ($i=0; $i <count($hotelType); $i++)
                <option> {{ $hotelType[$i]->hotel_types_Name }}</option>
            @endfor
        </select>
      </div>

      <div class="modal-body">
				<label for="hotelTitle">Place Name</label>
        <select name="placeName" class="form-control input-sm">
            @for ($i=0; $i <count($place); $i++)
                <option> {{ $place[$i]->placeName }}</option>
            @endfor
        </select>
      </div>

      <div class="modal-body">
				<label for="hotelTitle">Address</label>
				<textarea class="form-control input-sm"  name="address" rows="3"></textarea>

      </div>
      <div class="modal-body">
				<label for="hotelTitle">Website</label>
				<input type="text" name="website" class="form-control input-sm"  value="">
      </div>

     <div class="modal-body">
			 <label for="exampleInputFile">File input</label>
    		<input type="file" id="file" name="file">

  	</div>


			<div class="modal-footer">
				<input type="submit" class="btn btn-primary" value="Submit">
				<input type="hidden" value="{{ Session::token() }}" name="_token">
			</div>
		</div>
	</div>
</div>
</form>
