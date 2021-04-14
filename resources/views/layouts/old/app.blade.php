<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ucourse.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

    @stack('styles')
</head>
<body oncontextmenu="return false">
    @include('partials.navigation')

    @yield('jumbotron')

    <div id="app">
        
        <main class="py-4">

             @if(session('message'))
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-{{session('message')[0]}}">
                            <h4 class="alert-heading">{{__("Mensaje informativo")}}</h4>
                            <p>{{session('message')[1]}}</p>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
            @yield('dropdown')
        </main>
    </div>

    @yield('footer')

     <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    {{-- <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script> --}}
    <script src="{{ asset('js/dropdown.js') }}"></script>
    <script src="{{ asset('js/modulos.js') }}"></script>
    <script src="{{ asset('js/video.js') }}"></script>
    <script src="{{ asset('js/ucourse.js') }}"></script>
    <script src="{{ asset('js/public.js') }}"></script>
     
     @stack('scripts')


</body>
</html>
