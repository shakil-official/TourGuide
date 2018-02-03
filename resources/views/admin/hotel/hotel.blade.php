
@extends('app')

@section('content')
    @include('admin.header')

                  		{{-- <h1 class="page-header text-center ">Hotel Information<span class=""> --}}
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
          {{ Toastr::warning($error, 'Title',["progressBar" => true, "positionClass" => "toast-top-center"]) }}
        @endforeach
      @endif

      @if (Session::has('Success'))
          {{ Toastr::error(Session::get('Success'), 'Title', ["positionClass" => "toast-top-center"]) }}

      @endif
                         </span></h1>
                  	</div>
                  	<div class="col-sm-12">

                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Hotel Information</div>
                        <div class="panel-body">

                    		<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    		Hotel Add
                    		</a>
                        </div>

                        <!-- Table -->



                  		<table class="table table-hover table-striped">
                  			<thead>
                  				<tr>
                  					{{-- <th>ID</th> --}}
                  					<th>Hotel</th>
                            <th>Description</th>
                            <th>Hotel Type</th>
                              <th>Hotel Place</th>
                                <th>Hotel address</th>

                  					<th colspan="2">
                  						&nbsp;
                  					</th>
                  				</tr>
                  			</thead>
                  			<tbody>

                            @for ($i=0; $i <count($hotel); $i++)
                          <tr>
                  					{{-- <td width="10px">  {{ $hotel[$i]->id }} </td> --}}

                  					<td>{{ $hotel[$i]->hotelName }}</td>
                            <td>{{ $hotel[$i]->description }} </td>
                            @foreach (App\HotelType::where('id',$hotel[$i]->hoteltype_id )->get() as $c)
                              <td>{{$c->hotel_types_Name}} </td>
                            @endforeach

                            @foreach (App\Place::where('id',$hotel[$i]->place_id )->get() as $c)
                              <td>{{$c->placeName}} </td>
                            @endforeach

                              <td>{{ $hotel[$i]->address }}</td>

          					<td width="10px">
                					<a href="{{ route('admin.hotel.hotelEdit',['hotelEdit_id' => $hotel[$i]->id ]) }}" class="btn btn-primary">
                      		Edit
                      		</a>
          					</td>
                  					<td width="10px">
                  						<a href="{{route('admin.hotel.hoteldelete',['hoteldelete_id' => $hotel[$i]->id ]) }}" class="btn btn-danger btn-sm">Delete</a>
                  					</td>

                  				</tr>
                            @endfor
                  			</tbody>
                  		</table>
                  		 @include('admin.hotel.hoteladd') <!--here add create option -->
                     </div>

                  	</div>

                  </div>
              </div>
           </div>

             </div>
        </div>
       </div>
       <!-- /#page-content-wrapper -->

   </div>
@endsection
