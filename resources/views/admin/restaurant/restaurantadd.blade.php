
<form action="{{ route('restaurantCreate') }}" method="post" enctype="multipart/form-data">
<div class="modal fade" id="create">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>

			</div>
			<div class="modal-body">
				<label for="restaurantName">Restaurant Name</label>
				<input type="text" name="restaurantName" class="form-control input-sm">

			</div>
			<div class="modal-body">
				<label for="restaurantName">Restaurant Description</label>
				<textarea class="form-control input-sm" name="description" rows="3"></textarea>

			</div>
			<div class="modal-body">
				<label for="restaurantName">Restaurant Address</label>
				<textarea class="form-control input-sm"  name="address" rows="3"></textarea>

			</div>
			<div class="modal-body">
				<label for="restaurantName">Restaurant website</label>
				    <input type="text" name="website" class="form-control input-sm">

			</div>
			<div class="modal-body">
        <div class="row">
          <div class="col-xs-6">
						<label for="restaurantName">Restaurant Open</label>
            <div class="clearfix">
              <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="form-control input-sm"  name="start" value="13:14">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>
          </div>
          <div class="col-xs-6">
						<label for="restaurantName">Restaurant Close</label>
            <div class="clearfix">
              <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                <input type="text" class="form-control input-sm" name="end" value="13:14">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
            </div>
          </div>
        </div>
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
        <label for="">Active</label>
        <select name="status" class="form-control input-sm">
                <option>Active</option>
                <option>Deactive</option>
        </select>
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
