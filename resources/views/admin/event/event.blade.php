@extends('app')

@section('content')
  @include('admin.header')
  @if (Session::has('Success'))
    {{ Toastr::success(Session::get('Success'), 'Title', ["positionClass" => "toast-top-right"]) }}
  @endif

  @if (Session::has('delete'))
      {{ Toastr::success(Session::get('delete'), 'Title', ["positionClass" => "toast-top-right"]) }}
  @endif
  @if (Session::has('error'))
      {{ Toastr::success(Session::get('delete'), 'Title', ["positionClass" => "toast-top-right"]) }}
  @endif

  <div class="col-sm-12 col-sm-offset-0">
    <div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">Restaurant</div>
        <div class="panel-body">
          <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create" style=" margin-bottom: 12px;">Event Add </a>
        </div>

        {{-- table-bordered --}}

        <table class="table table-hover table-striped ">
          <thead>
            <tr>
              <th class="text-center" >Event</th>
    					<th class="text-center" >Description</th>
    					<th class="text-center" >Address</th>
    					<th class="text-center" >Open</th>
    					<th class="text-center" >Close</th>
    					<th class="text-center" >Place</th>
    					{{-- <th class="text-center" >Status</th> --}}
    					<th class="text-center" >Edit</th>
    					<th class="text-center" >Delete</th>
            </tr>
          </thead>
          <tbody>

            @for ($i=0; $i <count($event); $i++)
          <tr>
  					<td style=" width: 15%; border-right: 1px solid #cac4c4;" >
              {{ $event[$i]->title }}
            </td>
  					<td style=" width: 15%; border-right: 1px solid #cac4c4; " >
              {{ $event[$i]->description }}
            </td>
  					<td   style="border-right: 1px solid #cac4c4;">
              {{ $event[$i]->address }}
            </td>
  					<td  style="border-right: 1px solid #cac4c4;">
              {{ $event[$i]->open }}
            </td>
  					<td  style="border-right: 1px solid #cac4c4;">
              {{ $event[$i]->close }}
            </td>
  					<td style=" width: 7%; border-right: 1px solid #cac4c4;"  >
              @foreach (App\Place::where('id', $event[$i]->place_id )->get() as $c)
                 {{$c->placeName}}
              @endforeach

            </td>
  					{{-- <td style=" width: 8%; border-right: 1px solid #cac4c4;"  class="text-center">
              @if ($event[$i]->status == 1)
                <i class="fa fa-toggle-on fa-2x"  onclick="switchStatus({!! $event[$i]->id !!});" id="activeEvent{{$event[$i]->id}}" aria-hidden="true"></i>
              @else
                  <i class="fa fa-toggle-off fa-2x"
                  onclick="switchStatus({!! $event[$i]->id !!});"
                    id="switch{{$event[$i]->id}}"
                    aria-hidden="true"></i>
              @endif

            </td> --}}

		<td style=" width: 3%; " >

					<a href="{{ URL::to('event/'.$event[$i]->id) }}" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i>
      		Edit
      		</a>
		</td>
  					<td style=" width: 3%;">
              {{-- {{route('admin.Countrydelete',['Countrydelete_id' => $event[$i]->id ]) }} --}}

<a class="btn btn-danger" href="{{ URL::to('eventDelete/'.$event[$i]->id) }}" ><i class="fa fa-trash-o fa-fw"></i>Delete</a>


  					</td>

  				</tr>
                            @endfor
                  			</tbody>
                  		</table>
                          </div>

                  		  @include('admin.event.eventadd')<!--here add create option -->

                  	</div>



                    <nav aria-label="...">
                      <ul class="pager">
                      <li class="previous"> </li>
                      {{ $event->links() }}
                      <li class="next"> </li>
                      </ul>
                    </nav>
                  </div>


              </div>
           </div>

             </div>
        </div>
       </div>
       <!-- /#page-content-wrapper -->




   </div>
@endsection
