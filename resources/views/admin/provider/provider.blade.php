@extends('app')

@section('content')

        @include('admin.header')

                  		{{-- <h1 class="page-header text-center">Provider<span class=""> --}}
      @if (count($errors) > 0)
        @foreach ($errors->all() as $error)

        {{ $error }}

        @endforeach


          @endif

          @if (Session::has('Success'))
              {{ Toastr::error(Session::get('Success'), 'Title', ["positionClass" => "toast-top-center"]) }}
          @endif
                         </span></h1>
                  	</div>
                  	<div class="col-sm-7 col-sm-offset-2">



                      <div class="panel panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading  text-center" >Provider</div>
                        <div class="panel-body">

<a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">  Provider Add </a>
                        </div>

                        <!-- Table -->





                  		<table class="table table-hover table-striped">
                  			<thead>
                  				<tr>
                            {{-- <th>ID</th> --}}
                  					<th>Provider</th>
                  					<th colspan="2">
                  						&nbsp;
                  					</th>
                  				</tr>
                  			</thead>
                  			<tbody>

                            @for ($i=0; $i <count($provider); $i++)
                          <tr>{{--
                  					<td width="10px">

                             </td> --}}
                  					<td> {{ $provider[$i]->service_provider }}</td>

          					<td width="10px">
                      {{-- {{route('admin.countryEdit',['CountryEdit_id' => $provider[$i]->id ]) }} --}}
                					<a href="{{ URL::to('providerUpdate/'.$provider[$i]->id) }}" class="btn btn-primary">
                      		<i class="fa fa-pencil fa-fw"></i> Edit
                      		</a>
          					</td>
                  					<td width="10px">
                              {{-- {{route('admin.Countrydelete',['Countrydelete_id' => $provider[$i]->id ]) }} --}}
                  						<a href="{{ URL::to('providerdelete/'.$provider[$i]->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-fw"></i> Delete</a>
                  					</td>

                  				</tr>
                            @endfor
                  			</tbody>
                  		</table>
                    </div>
                  		 @include('admin.provider.provideradd') <!--here add create option -->

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
