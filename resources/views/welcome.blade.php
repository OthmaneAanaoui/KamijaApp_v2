<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KAMIJA</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"  type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/welpage.css') }} " rel="stylesheet"  type="text/css">

</head>
<body>


<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
        <div class="top-right links" >
            @if (Auth::check())
                <a href="{{ url('/home') }}">Accueil</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">
                    S'inscrire
                </a>
            @endif
        </div>
    @endif

    <div class="content">

        <img src="{{ URL::asset('images/login.png') }}" width="40%" height="40%">
        <h1 style="font-family: 'Arial Black'">

        </h1>


    </div>





</div>


</body>
</html>