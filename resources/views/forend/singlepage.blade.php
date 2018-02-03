@extends('app')
@section('content')
{{-- navbar-custom --}}
  @include('forend.nav')

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form action="{{ route('mainPagePlaceSearch') }}" method="GET" >
          <div style="" id="searchSingleTop">
            <div class="input-group stylish-input-group">
              <input type="text" class="form-control"  placeholder="Search" name="availablePlace" id="availablePlace">
              <span class="input-group-addon">
                <button type="submit">
                  <span class="glyphicon glyphicon-search"></span>
                </button>
                  <input type="hidden" value="{{ Session::token() }}" name="_token">
              </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>







  @include('forend.design')







     </div>
  @endsection
