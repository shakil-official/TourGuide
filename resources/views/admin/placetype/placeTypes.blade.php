@extends('app')
@section('content')
    @include('admin.header')
  		{{-- <h4 class="page-header">Place Types<span class=""> --}}
        @if (count($errors) > 0)

          @foreach ($errors->all() as $error)
            {{ $error }}
          @endforeach
        @endif

        @if (Session::has('Success'))
            {{ Toastr::info(Session::get('Success'), '', ["positionClass" => "toast-top-center"]) }}

        @endif
      </span></h4>
  </div>
      	<div class="col-sm-8 col-sm-offset-2">

          <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Place Types</div>
            <div class="panel-body">
              <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
              Place Types Add
              </a>
            </div>

            <!-- Table -->
      		<table class="table table-hover table-striped">
      			<thead>
      				<tr>

      					<th>Place Types</th>
      					<th colspan="2">
      						&nbsp;
      					</th>
      				</tr>
      			</thead>
            <tbody>
              @for ($i=0; $i <count($placeType); $i++)
                <tr>
        					{{-- <td width="10px">  {{ $placeType[$i]->id }} </td> --}}
        					<td>{{ $placeType[$i]->place_type_name}}</td>
					<td width="10px">
      					<a href="{{route('admin.placetype.placetypesEdit',['PlacetypeEdit_id' => $placeType[$i]->id ]) }}" class="btn btn-primary">
            		Edit
            		</a>
					</td>
        					<td width="10px">
        						<a href="{{route('admin.placetype.placetypedelete',['placeTypedelete_id' => $placeType[$i]->id ]) }}" class="btn btn-danger btn-sm">Delete</a>
        					</td>

        				</tr>
                  @endfor
        			</tbody>
        		</table>
                  		 @include('admin.placetype.placeTypeadd') <!--here add create option -->

                          </div>
                  	</div>
                  	{{-- <div class="col-sm-5">
                  		<pre>


                        @for ($i=0; $i <count($placeType); $i++)
                          {{ $placeType[$i]->id }}
                          {{ $placeType[$i]->place_type_name}}
                          @endfor



                  		</pre>
                  	</div> --}}
                  </div>


              </div>
           </div>

             </div>
        </div>
       </div>
       <!-- /#page-content-wrapper -->

   </div>
@endsection
