@extends('app')

@section('content')

        @include('admin.header')

                  		{{-- <h1 class="page-header text-center">warning<span class=""> --}}
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
                  	<div class="col-sm-10 col-sm-offset-1">

                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">  Warning </div>
                        <div class="panel-body">
                          <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                         warning Add
                          </a>

                        </div>

                        <!-- Table -->

                  		<table class="table table-hover table-striped">
                  			<thead>
                  				<tr>
                            <th class="text-center">Title</th>
                  					<th class="text-center">Descreption</th>
                  					<th class="text-center">Type</th>
                  					<th class="text-center">Place</th>
                  					<th class="text-center">Edit</th>
                  					<th class="text-center">Delete</th>

                  				</tr>
                  			</thead>
                  			<tbody>

                            @for ($i=0; $i <count($warning); $i++)
                          <tr>
                  					<td style=" width: 35%; border-right: 1px solid #cac4c4; "> {{ $warning[$i]->title }}</td>
                  					<td style=" width: 25%; border-right: 1px solid #cac4c4; "> {{ $warning[$i]->description }}</td>
                  					<td style="border-right: 1px solid #cac4c4;" class="text-center"> {{ $warning[$i]->warningType }}</td>

                            @foreach (App\Place::where('id',$warning[$i]->place_id )->get() as $c)
                              <td style="border-right: 1px solid #cac4c4;" class="text-center">{{$c->placeName}} </td>
                            @endforeach
                  					{{-- <td> {{ [$i]->place_id }}</td> --}}






          					<td width="10px">
                      {{-- {{route('admin.countryEdit',['CountryEdit_id' => $service[$i]->id ]) }} --}}
                					<a href="{{ URL::to('warningUpdate/'.$warning[$i]->id) }}" class="btn btn-primary">
                      		<i class="fa fa-pencil fa-fw"></i> Edit
                      		</a>
          					</td>
                  					<td width="10px">
                              {{-- {{route('admin.Countrydelete',['Countrydelete_id' => $service[$i]->id ]) }} --}}
                  						<a href="{{ URL::to('warningdelete/'.$warning[$i]->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i> Delete</a>
                  					</td>

                  				</tr>
                            @endfor
                  			</tbody>
                  		</table>


                  		 @include('admin.warning.warningadd') <!--here add create option -->
    </div>
                  	</div>

                  </div>

                  <nav aria-label="...">
                    <ul class="pager">
                    <li class="previous"> </li>
                    {{ $warning->links() }}
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
