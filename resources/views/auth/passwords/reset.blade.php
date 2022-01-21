
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <title></title>
    <link href="{{ URL::asset('css/login.css') }} " rel="stylesheet">
</head>
<style>
    body{
        background-image: linear-gradient(to right, rgba(225, 0, 122,10.50), rgba(208, 0, 245,0.6)),

        url("{{ URL::asset('images/web.png') }}");
        background-size: 100% auto;
    }
</style>
<body >
<div class="flex-center position-ref full-height">



    <div class="panel-body">

        <div class="container white z-depth-2">
            <ul class="tabs teal">

                <li class="tab col s3" style="background-color: #7b1fa2"><a class="white-text" href="#register">S'inscrire</a></li>
            </ul>

            <div id="register" class="col s12">
            <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-container">
                        <img src="{{ URL::asset('images/logo-2018.png') }}"  alt="image" />
                       
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <label for="email">Email</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <label for="password">Mot de passe</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                <label for="password-confirm">Confirmation mot de passe</label>
                            </div>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                        </center>
                    </div>
                </form>
            </div>
        </div>


    </div>


</div>





</body>
</html>
