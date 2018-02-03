@extends('app')
@section('content')
    @include('admin.header')

    {{-- <h4 class="text-center"></h4> --}}
    {{-- <table class="table table-hover">
      <tr>
        <td style="width: 13%;text-align: center;" >Image</td>
        <td style="width: 12%;text-align: center;" >Title</td>
        <td style="width: 25%;text-align: center;" >Description</td>
        <td style="width: 12%;text-align: center;" >Address</td>
        <td style="width: 12%;text-align: center;" >Type</td>
        <td style="width: 12%;text-align: center;" >View</td>
        <td style="width: 12%;text-align: center;" >Edit</td>
        <td style="width: 12%;text-align: center;">Delete</td>

      </tr>


@for ($i=0; $i <count($visitinformation); $i++)


      <tr>
        <td class="">
          @foreach(App\Photo::select('photo')->where('visitinformation_id',  $visitinformation[$i]->id)->get() as $photo)
            {{ $photo->id  }}
            <img  class="img-responsive"
                  alt="Responsive image"
                  style="width: 130px;height: 110px;"
                  src=" {{   asset('images/'.$photo->photo)  }}">
                  @break
          @endforeach
        </td>
        <td style="padding-top: 20px;">{{ substr($visitinformation[$i]->title,0,35).".." }}</td>
        <td style="padding-top: 20px;">   {{ substr($visitinformation[$i]->description,0,35)."..." }} </td>
        <td style="padding-top: 20px;">  {{ substr( $visitinformation[$i]->address,0,20)."..." }} </td>
        <td style="padding-top: 20px;text-align: center;">

          @foreach( $visitinformation[$i]->placeType as $p )

          <span class="label label-default" style="margin: 1px 4px;padding: 1px 4px;text-align: center;"> {{ $p->place_type_name  }}  </span>

          @endforeach

        </td>


<td style="text-align: center;padding-top: 20px;">
<a   href="{{ URL::to('postedit/' .  $visitinformation[$i]->id) }}" class="btn btn-warning btn-sm"> View <span class="glyphicon glyphicon-home" aria-hidden="true"></span> </a>

 </td>


 <td style="text-align: center;padding-top: 20px;">
 <a href="{{ URL::to('postedit/' .  $visitinformation[$i]->id) }}" class="btn btn-info btn-sm"> Edit <span  class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>

  </td>


<td style="text-align: center;padding-top: 20px;">
<a class="btn btn-danger waves-effect waves-light remove-record" data-toggle="modal" data-url="{{ URL::to('postdelete/'.$visitinformation[$i]->id) }}" data-id="{{$visitinformation[$i]->id}}" >Delete</a>

</td>




      </tr>



       @endfor


    </table> --}}



  <!-- ======================= try new style  ============================== -->

{{-- <div class="row"> --}}


<div class="panel panel-default" >
  <!-- Default panel contents -->
  <div class="panel-heading text-center">All Place View </div>
  <div class="panel-body" style="box-shadow: 0px 3px 3px 3px #e3e0de63; ">



  <!-- visitinformation  -->




    @for ($i=0; $i <count($visitinformation); $i++)
  <div class="col-sm-4">
    <div class="panel panel-default" style="box-shadow: 0px 3px 3px 3px #e3e0de63; ">
      <!-- Default panel contents -->
      <div class="panel-heading">{{ substr($visitinformation[$i]->title,0,35).".." }}

        @foreach( $visitinformation[$i]->placeType as $p )

        <span class="label label-default" style="margin: 1px 4px;padding: 1px 4px;text-align: center;background-color: #f40327;color: #f3f3f3;"> {{ $p->place_type_name  }}  </span>

        @endforeach

       </div>
      <div class="panel-body">

        @foreach(App\Photo::select('photo')->where('visitinformation_id',  $visitinformation[$i]->id)->get() as $photo)
          {{ $photo->id  }}
          <img  class="img-responsive"
                alt="Responsive image"
                style="width: 130px;height: 110px;margin: auto;"
                src=" {{   asset('images/'.$photo->photo)  }}">
                @break
        @endforeach

        <p style="border-left: 3px double #03A9F4;padding-left: 11px;font-size: small;margin-top: 5px;"> {{ substr($visitinformation[$i]->description,0,45)."..." }}</p>

        {{-- @foreach( $visitinformation[$i]->placeType as $p )

        <span class="label label-default" style="margin: 1px 4px;padding: 1px 4px;text-align: center;background-color: #f40327;color: #f3f3f3;"> {{ $p->place_type_name  }}  </span>

        @endforeach --}}
      </div>

      <div class="row">

        <div class="col-sm-4">
          <a   href="{{ URL::to('postshow/' .  $visitinformation[$i]->id) }}"
            class="btn btn-warning btn-sm" style="float: left;margin-left: 60px;margin-right: 20px;margin-bottom:15px;"> View <span class="glyphicon glyphicon-home" aria-hidden="true"></span> </a>
        </div>
        <div class="col-sm-4">
          <a href="{{ URL::to('postedit/' .  $visitinformation[$i]->id) }}"
            class="btn btn-info btn-sm"
            style="float: left; margin: 0px 35px;margin-bottom:15px;"> Edit <span  class="glyphicon glyphicon-cog" aria-hidden="true"></span> </a>
        </div>
        <div class="col-sm-4">


       @if (Auth::guard('admin')->user()->job_title == 1)
         <a class="btn btn-danger waves-effect waves-light remove-record btn-sm" data-toggle="modal" data-url="{{ URL::to('postdelete/'.$visitinformation[$i]->id) }}" data-id="{{$visitinformation[$i]->id}}"
           style="margin: 0px 20px;margin-bottom:15px; " >Delete</a>
       @endif


        </div>

      </div>





    </div>
    <div class="clearfix"></div>

  </div>
     @endfor



</div>


</div>

<nav aria-label="...">
  <ul class="pager">
  <li class="previous"> </li>
  {{ $visitinformation->links() }}
  <li class="next"> </li>
  </ul>
</nav>

   </div>
@endsection
