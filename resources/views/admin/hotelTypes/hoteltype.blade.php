@extends('app')

@section('content')
    @include('admin.header')
  		{{-- <h1 class="page-header">Hotel Types<span class=""> --}}
        @if (count($errors) > 0)

          @foreach ($errors->all() as $error)
            {{ $error }}
          @endforeach
        @endif

        @if (Session::has('Success'))
            {{ Toastr::info(Session::get('Success'), '', ["positionClass" => "toast-top-center"]) }}

        @endif
      </span></h1>
  </div>
      	<div class="col-sm-8 col-sm-offset-2">


          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Hotel Types</div>
            <div class="panel-body">
              <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                    		Hotel Types Add
                    		</a>
            </div>

            <!-- Table -->
            <table class="table table-hover table-striped">
      			<thead>
      				<tr>
      					<th>ID</th>
      					<th>Hotel Types</th>
      					<th colspan="2">
      						&nbsp;
      					</th>
      				</tr>
      			</thead>
            <tbody>
              @for ($i=0; $i <count($hotelType); $i++)
                <tr>
        					<td width="10px">  {{ $hotelType[$i]->id }} </td>
        					<td>{{ $hotelType[$i]->hotel_types_Name." Star" }}</td>
					<td width="10px">
      					<a href="{{route('admin.hotelTypes.hoteltypeEdit',['HoteltypeEdit_id' => $hotelType[$i]->id ]) }}" class="btn btn-primary">
            		Edit
            		</a>
					</td>
        					<td width="10px">
        						<a href="{{route('admin.hotelTypes.hoteltypedelete',['Hoteltypedelete_id' => $hotelType[$i]->id ]) }}" class="btn btn-danger btn-sm">Delete</a>
        					</td>

        				</tr>
                  @endfor
        			</tbody>
        		</table>
                  		 @include('admin.hotelTypes.hoteltypeadd') <!--here add create option -->

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
