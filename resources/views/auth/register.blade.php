<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
    <title>Ynov sec </title>
    <link href="{{ URL::asset('css/login.css') }} " rel="stylesheet">
</head>

<style>


    .tabs .indicator {
        background-color: white;
        height: 60px;
        opacity: 0.3;
    }

    .form-container {
        background: rgba(240, 158, 210, 0.5);
        padding: 40px;
        padding-top: 10px;
    }

    .confirmation-tabs-btn {
        position: absolute;
    }

    body {
        background-image: linear-gradient(to right, rgba(117, 117, 255, 10.50), rgba(208, 0, 245, 0.6)),
        url("{{ URL::asset('images/web.png') }}");
        background-size: 100% auto;
    }

    /* width */
    ::-webkit-scrollbar {
        width: 7px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #7D2B8B;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #E1007A;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }


    span {
        background: transparent;
        min-width: 53px;
        border: none;
    }

    i {
        font-size: 1.5em;
        color: rgba(117, 117, 0, 0.5);
    }


    .container {
        width: 500px;
        height: 100%;
        /*  Pour centrer le contenu d'un bloc  on utilise la prop text-align  */
        text-align: center;
        /*  Pour centrer un bloc on doit d'abord préciser le width et utiliser ensuite la prop margin  */
        margin: auto;
        background-color: rgba(117, 117, 0, 0.5);
        margin-top: 50px;
        border-radius: 5px;
    }

    img {
        width: 150px;
        hight: 150px;

    }


    body {
        font-family: Helvetica;

        -webkit-font-smoothing: antialiased;
    }


    .button {
        position: relative;
        display: inline-block;
        padding: 12px 24px;
        margin: .3em 0 1em 0;
        width: 100%;
        vertical-align: middle;
        color: #fff;
        font-size: 16px;
        line-height: 20px;
        -webkit-font-smoothing: antialiased;
        text-align: center;
        letter-spacing: 1px;
        background: transparent;
        border: 0;
        border-bottom: 2px solid #3160B6;
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .button:focus {
        outline: 0;
    }


    /* Button modifiers */

    .buttonBlue {
        background: #4a89dc;
        text-shadow: 1px 1px 0 rgba(117, 117, 0, 0.5);
    }

</style>


<body>
<div class="flex-center position-ref full-height">


    <div class="panel-body">

        <div class="container white z-depth-2">
            <ul class="tabs teal">
               
                <li class="tab col s3" ><a class="white-text" href="#register">S'inscrire</a>
                </li>
            </ul>
            
            <div id="register" class="col s12">
                <form class="col s12" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <div class="form-container">
                        <img src="{{ URL::asset('images/login.png') }}" alt="image"/>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                       required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                <label for="last_name">Nom Complet</label>
                            </div>

                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>

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
                                <input id="password" type="password" class="validate form-control" name="password"
                                       required>

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
                                <input id="confirm_password" type="password" class="form-control"
                                       name="password_confirmation" required>

                                <label for="password-confirm">Confirmation mot de passe</label>
                            </div>
                        </div>
                        <center>
                            <button  class="btn " type="submit" name="action">
                                Enregistrer
                            </button>
                        </center>
                    </div>

                    <script>
                        var password = document.getElementById("password")
                            , confirm_password = document.getElementById("confirm_password");

                        function validatePassword() {
                            if (password.value != confirm_password.value) {
                                confirm_password.setCustomValidity("Passwords Don't Match");
                            } else {
                                confirm_password.setCustomValidity('');
                            }
                        }

                        password.onchange = validatePassword;
                        confirm_password.onkeyup = validatePassword;</script>
                </form>
            </div>
        </div>


    </div>


</div>


</body>
</html>
