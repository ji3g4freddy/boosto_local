<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title> BoostO錄音室管理 | @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--360 photo-->
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.2/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.pannellum.org/2.2/pannellum.js">        
    </script>
    <style>
    #panorama {
        width: 330px;
        height: 230px;
        margin-left:auto; 
        margin-right:auto;
    }
    table{

        margin-left:auto; 
        margin-right:auto;
    }

    p{
        font-size: 18px;
    }

    .pnlm-title-box {
    position: relative;
    font-size: 40px;
    display: table;
    padding-left: 5px;
    margin-bottom: 3px;
    
    }
    @media (min-width: 768px) {
        #panorama {
        width: 1000px;
        height: 500px;
    }
    }
    </style>

    <!-- Bootstrap Default Styles -->
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">-->

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
        @include('layouts.partials.nav')

        <div class="container">
        @include('layouts.partials.errors')
        @yield('content')
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
