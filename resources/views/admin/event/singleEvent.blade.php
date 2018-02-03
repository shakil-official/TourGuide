@extends('app')
 @section('content')
     @include('admin.header')
      <div class="row">
       <div class="col-sm-8 col-sm-offset-2">
         <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading text-center"> Event </div>
          <div class="panel-body">

               <form action="{{ route('eventUpdate') }}" method="post" enctype="multipart/form-data">
             <div class="modal-body">
               				<label for="Name"> Name</label>
               				<input type="text" name="title" class="form-control input-sm"  value="{{ $event->title}}">

               			</div>
               			<div class="modal-body">
               				<label for="Name"> Description</label>
               				<textarea class="form-control input-sm" name="description" rows="3" > {{ $event->description}}</textarea>
               			</div>

               			<div class="modal-body">
               				<label for="Name"> Address</label>
               				<textarea class="form-control input-sm"  name="address" rows="3">{{ $event->address}}</textarea>
               			</div>

               			<div class="modal-body">
                       <div class="row">
                         <div class="col-xs-6">
                           <label for="restaurantName">Start</label>
                           <div class="clearfix">
                             <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                               <input type="text" class="form-control input-sm"  name="start" value="{{ $event->open}}">
                               <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-time"></span>
                               </span>
                             </div>
                           </div>
                         </div>
                         <div class="col-xs-6">
                           <label for="restaurantName">End</label>
                           <div class="clearfix">
                             <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                               <input type="text" class="form-control input-sm" name="end"  value="{{ $event->close}}">
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
                            @if (App\Restaurant::where('place_id',$place->id)->where('id',$event->id)->count() > 0)
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

           			<div class="modal-footer">
           				<input type="submit" class="btn btn-primary" value="Submit">
           				<input type="hidden" value="{{ Session::token() }}" name="_token">
                  <input type="hidden" value="{{ $event->id }}" name="id">
           			</div>

               </form>

            </div>
        </div>
   </div>
 </div>




    </div>
 @endsection
