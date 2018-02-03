@extends('app')

@section('content')
  @include('admin.header')

 {{-- @if (!Auth::check()) --}}

{{-- @if (Auth::guard('admin')->check())



@else
    <script>window.location = "/admin/login";</script>

 @endif --}}


  <div class="col-sm-11 col-md-offset-1 ">
    <div class="panel panel-default">
     <!-- Default panel contents -->

       <div class="panel-heading text-center">Insert Place information</div>
     <div class="panel-body ">

       <br>
       <br>


    <form class="form-horizontal"   id="upload" enctype="multipart/form-data" data-parsley-validate="">
      <div class="form-group">
        <label for="exampleInputEmail1" class="col-md-2" style="text-align: right;">Title</label>
        <div class="col-sm-8">
          <input type="text" class="form-control input-sm" name="title" id="title" placeholder="Enter place title" required="" minlength="6" maxlength="80">
				</div>
			</div>

      <div class="form-group">
        <label for="exampleInputEmail1" class="col-md-2" style="text-align: right;">Description</label>
        <div class="col-sm-8">
          <textarea rows="6" cols="112"  id="description" name="description"  style="overflow: hidden;" required></textarea>
        </div>
			</div>

      <!--    -->

      <div class="form-group">
        <label for="exampleInputEmail1" class="col-md-2" style="text-align: right;">Address</label>
        <div class="col-sm-8">
          <textarea  rows="6" cols="112" id="address" name="address"  style="overflow: hidden;" required></textarea>
        </div>
      </div>

      <!--   -->

      <div class="form-group">
        <label for="exampleInputEmail1" class="col-md-2" style="text-align: right;">Place</label>
        <div class="col-sm-8" >
          <select id = "place" name = "place" class="ShowPostPlace form-control input-sm">

					</select>
        </div>
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1" class="col-md-2" style="text-align: right;">type</label>
        <div class="col-sm-8" >
          <select class="js-example-basic-multiple form-control input-sm" id="types" name="types[]" multiple required>
            @foreach (App\Placetype::orderBy('id', 'DESC')->get() as $c)
              <option value={{$c->id}}>  {{$c->place_type_name}}</option>
           @endforeach
          </select>
        </div>
      </div>

      <div class="form-group">
        <label for="exampleInputFile" class="col-md-2" style="text-align: right;">File input</label>
        <input type="file" id = "ImageUpload" name="file[]" multiple style="padding-left: 17px;">
      </div>

      <input type="submit" class="btn btn-primary col-md-offset-2">
      <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>
    </div>
    </div>
    </div>
  </div>
</div>
{{-- @else
    <script>window.location = "/admin/login";</script>

 @endif --}}
@endsection
