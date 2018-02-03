@extends('app')

@section('content')

        @include('admin.header')

                  		{{-- <h1 class="page-header text-center">Market<span class=""> --}}
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)

        {{ $error }}

        @endforeach


          @endif

          @if (Session::has('Success'))
              {{ Toastr::success(Session::get('Success'), ' ', ["positionClass" => "toast-top-right"]) }}
          @endif
          @if (Session::has('delete'))
              {{ Toastr::success(Session::get('delete'), 'Title', ["positionClass" => "toast-top-right"]) }}
          @endif
                         </span></h1>
                  	</div>
                  	<div class="col-sm-10 col-sm-offset-1">

                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">Market</div>
                        <div class="panel-body">
                          <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                          Market Add
                          </a>
                        </div>

                        <!-- Table -->






                  		<table class="table table-hover table-striped">
                  			<thead>
                  				<tr>


                            <th class="text-center">Market Name</th>
                  					<th class="text-center">Address</th>
                  					<th class="text-center">Edit</th>
                  					<th class="text-center">Delete</th>

                  				</tr>
                  			</thead>
                  			<tbody>

                            @for ($i=0; $i <count($market); $i++)
                          <tr>{{--
                  					<td width="10px">

                             </td> --}}
                  					<td style="width: 35%;  border-right: 1px solid #cac4c4; "> {{ $market[$i]->marketName }}</td>
                  					<td style="width: 40%;  border-right: 1px solid #cac4c4; "> {{ $market[$i]->address }}</td>




          					<td class="text-center">
                      {{-- {{route('admin.countryEdit',['CountryEdit_id' => $market[$i]->id ]) }} --}}
                					<a href="{{ URL::to('marketUpdate/'.$market[$i]->id) }}" class="btn btn-primary">
                      		<i class="fa fa-pencil fa-fw"></i> Edit
                      		</a>
          					</td>
                  					<td width="10px">
                              {{-- {{route('admin.Countrydelete',['Countrydelete_id' => $market[$i]->id ]) }} --}}
                  						<a href="{{ URL::to('marketdelete/'.$market[$i]->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i> Delete</a>
                  					</td>

                  				</tr>
                            @endfor
                  			</tbody>
                  		</table>

                  		 @include('admin.market.marketadd') <!--here add create option -->
        </div>
                  	</div>

                  </div>

                  <nav aria-label="...">
                    <ul class="pager">
                    <li class="previous"> </li>
                    {{ $market->links() }}
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
