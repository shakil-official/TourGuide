
@extends('app')

@section('content')
    @include('admin.header')
  		<h1 class="page-header">Place<span class="">
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
      	<div class="col-sm-7">
      		<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
      		Place Add
      		</a>
      		<table class="table table-hover table-striped">
      			<thead>
      				<tr>
      					<th>ID</th>
      					<th>Place</th>
      					<th colspan="2">
      						&nbsp;
      					</th>
      				</tr>
      			</thead>
            <tbody>
              @for ($i=0; $i <count($place); $i++)
                <tr>
        					<td width="10px">  {{ $place[$i]->id }} </td>
        					<td>{{ $place[$i]->placeName }}</td>
					<td width="10px">
      					<a href="{{route('admin.place.placeEdit',['PlaceEdit_id' => $place[$i]->id ]) }}" class="btn btn-primary">
            		Edit
            		</a>
					</td>
        					<td width="10px">
        						<a href="{{route('admin.place.placedelete',['Placedelete_id' => $place[$i]->id ]) }}" class="btn btn-danger btn-sm">Delete</a>
        					</td>

        				</tr>
                  @endfor
        			</tbody>
        		</table>
                  		 @include('admin.place.placeadd') <!--here add create option -->

                  	</div>
                  	<div class="col-sm-5">
                  		<pre>
                      @for ($i=0; $i <count($place); $i++)
                        {{ $place[$i]->id }}

                        {{ $place[$i]->placeName }}
                        {{ $place[$i]->district_id }}
                      @endfor

                  		</pre>
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
