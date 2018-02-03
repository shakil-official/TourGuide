@extends('app')

@section('content')

        @include('admin.header')

                  		{{-- <h1 class="page-header text-center">Service<span class=""> --}}
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)

        {{ $error }}

        @endforeach


          @endif

          @if (Session::has('Success'))
              {{ Toastr::success(Session::get('Success'), 'Title', ["positionClass" => "toast-top-right"]) }}
          @endif
          @if (Session::has('delete'))
              {{ Toastr::success(Session::get('delete'), 'Title', ["positionClass" => "toast-top-right"]) }}
          @endif
                         </span></h1>
                  	</div>
                  	<div class="col-sm-11 col-sm-offset-1">


                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Service</div>
                        <div class="panel-body">
                          <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create"> Service Add
                          </a>
                        </div>

                        <!-- Table -->
                  		<table class="table table-hover table-striped">
                  			<thead>
                  				<tr>
                            <th class="text-center">Email</th>
                  					<th class="text-center">Contact</th>
                  					<th class="text-center">Website</th>
                  					<th class="text-center">Address</th>
                  					<th class="text-center">Provider</th>
                  					<th class="text-center">Place</th>
                  					<th class="text-center">Edit</th>
                  					<th class="text-center">Delete</th>

                  				</tr>
                  			</thead>
                  			<tbody>

                            @for ($i=0; $i <count($service); $i++)
                          <tr>{{--
                  					<td width="10px">

                             </td> --}}
                  					<td style="border-right: 1px solid #cac4c4;"> {{ $service[$i]->email }}</td>
                  					<td style="border-right: 1px solid #cac4c4;"> {{ $service[$i]->contact }}</td>
                  					<td style="border-right: 1px solid #cac4c4;"> {{ $service[$i]->website }}</td>
                  					<td style="border-right: 1px solid #cac4c4;"> {{ $service[$i]->address }}</td>
                  					<td style="border-right: 1px solid #cac4c4;"> {{ $service[$i]->provider_id }}</td>
                  					<td style="border-right: 1px solid #cac4c4;"> {{ $service[$i]->place_id }}</td>





          					<td width="10px">
                      {{-- {{route('admin.countryEdit',['CountryEdit_id' => $service[$i]->id ]) }} --}}
                					<a href="{{ URL::to('serviceUpdate/'.$service[$i]->id) }}" class="btn btn-primary">
                      		<i class="fa fa-pencil fa-fw"></i> Edit
                      		</a>
          					</td>
                  					<td width="10px">
                              {{-- {{route('admin.Countrydelete',['Countrydelete_id' => $service[$i]->id ]) }} --}}
                  						<a href="{{ URL::to('servicedelete/'.$service[$i]->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i> Delete</a>
                  					</td>

                  				</tr>
                            @endfor
                  			</tbody>
                  		</table>
                        </div>

                  		 @include('admin.service.serviceadd') <!--here add create option -->

                  	</div>

                  </div>

                  <nav aria-label="...">
                    <ul class="pager">
                    <li class="previous"> </li>
                    {{ $service->links() }}
                    <li class="next"> </li>
                    </ul>
                  </nav>



              </div>
           </div>

             </div>
        </div>
       </div>
       <!-- /#page-content-wrapper -->

   </div>
@endsection
