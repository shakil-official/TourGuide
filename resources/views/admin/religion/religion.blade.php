
@extends('app')

@section('content')
    @include('admin.header')
  		{{-- <h1 class="page-header">Religion<span class=""> --}}
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
      	<div class="col-sm-7 col-sm-offset-2">


          <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Religion</div>
  <div class="panel-body">
    <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
    Religion Add
    </a>
  </div>

  <!-- Table -->



      		<table class="table table-hover table-striped">
      			<thead>
      				<tr>
      					<th>Religion</th>
      					<th colspan="2">
      						&nbsp;
      					</th>
      				</tr>
      			</thead>
            <tbody>
              @for ($i=0; $i <count($religion); $i++)
                <tr>
        					{{-- <td width="10px">  {{ $religion[$i]->id }} </td> --}}
        					<td>{{ $religion[$i]->religion_name }}</td>
					<td width="10px">
      					<a href="{{route('admin.religion.religionEdit',['ReligionEdit_id' => $religion[$i]->id ]) }}" class="btn btn-primary">
            		Edit
            		</a>
					</td>
        					<td width="10px">
        						<a href="{{route('admin.religion.religiondelete',['Religiondelete_id' => $religion[$i]->id ]) }}" class="btn btn-danger btn-sm">Delete</a>
        					</td>

        				</tr>
                  @endfor
        			</tbody>
        		</table>
                  		 @include('admin.religion.religionadd') <!--here add create option -->
</div>
                  	</div>
                  	<div class="col-sm-5">

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
