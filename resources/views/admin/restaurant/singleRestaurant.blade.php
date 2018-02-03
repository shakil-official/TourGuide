@extends('app')
 @section('content')
     @include('admin.header')




     <div class="row">
       <div class="col-sm-8 col-sm-offset-2">


         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading text-center"> Restaurant </div>
          <div class="panel-body">





               <form action="{{ route('restaurantUpdate') }}" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               				<label for="restaurantName">Restaurant Name</label>
               				<input type="text" name="restaurantName" class="form-control input-sm"  value="{{ $restaurant->name}}">

               			</div>
               			<div class="modal-body">
               				<label for="restaurantName">Restaurant Description</label>
               				<textarea class="form-control input-sm" name="description" rows="3" > {{ $restaurant->description}}</textarea>

               			</div>
               			<div class="modal-body">
               				<label for="restaurantName">Restaurant Address</label>
               				<textarea class="form-control input-sm"  name="address" rows="3">{{ $restaurant->address}}</textarea>

               			</div>
               			<div class="modal-body">
               				<label for="restaurantName">Restaurant website</label>
                      <input type="text" name="website" class="form-control input-sm"  value="{{ $restaurant->website}}">
               			</div>
               			<div class="modal-body">
                       <div class="row">
                         <div class="col-xs-6">
                           <label for="restaurantName">Restaurant Open</label>
                           <div class="clearfix">
                             <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                               <input type="text" class="form-control input-sm"  name="start" value="{{ $restaurant->open}}">
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
                               <input type="text" class="form-control input-sm" name="end"  value="{{ $restaurant->close}}">
                               <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-time"></span>
                               </span>
                             </div>
                           </div>
                         </div>
                       </div>
               			</div>
                    <div class="modal-body">

                    <div class="form-group">
                      <label for=" " class="col-sm-2">Place</label>
                      <div class="col-sm-10">
                        <select id = "" name = "place" class="form-control input-sm">

                          @foreach ($places as $place)
                            @if (App\Restaurant::where('place_id',$place->id)->where('id',$restaurant->id)->count() > 0)
                              <option selected="selected" >  {{ $place->placeName }}</option>
                            @else
                              <option>  {{ $place->placeName }}</option>
                            @endif
                          @endforeach

                        </select>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="modal-body">
            				<label for="exampleInputFile">File input</label>
            				 <input type="file" id="file" name="file">
            		 </div>
               			<div class="modal-footer">
               				<input type="submit" class="btn btn-primary" value="Submit">
               				<input type="hidden" value="{{ Session::token() }}" name="_token">
                      <input type="hidden" value="{{ $restaurant->id }}" name="id">
               			</div>

               </form>

                 </div>
        </div>





   </div>
 </div>




    </div>
 @endsection
