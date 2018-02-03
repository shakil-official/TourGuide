<!doctype html>
<html lang="{{ config('app.locale') }}">
{{-- <html lang="en" --}}

    <head>
        <meta charset="utf-8">
          {{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
          <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Tour Guid</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
         <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.css">




    </head>
    <body>
        {{-- <div class="container-fluid"> --}}

            @yield('content')

        {{-- </div> --}}

        <script src="{{ asset('js/app.js') }}"></script>	<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB02GTmRhfs86fq3o61rX4Rst2rMjF0e4A&libraries=places"> </script>

<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>



        {{-- <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.5/slick.min.js"></script>
        <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

       {!! Toastr::message() !!}
    </body>
</html>
