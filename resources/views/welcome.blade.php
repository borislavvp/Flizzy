<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Flizzy</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @if(Auth::check())
                            @if(Auth::user()->isAdmin())
                                <a href="{{ url('/admin') }}">Admin Panel</a>
                            @endif
                        @endif
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth

                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img width="450px" class="img-fluid" src="/images/logo_transparent.png">
                </div>

                <div class="links">
                    <h1 style="text-transform: uppercase;
                        font-weight: 400;
                        margin-top: -100px;"
                        >Welcom to Flizzy {{Auth::check() ? ', ' . Auth::user()->name : ''}}</h1>
                    <p style="text-transform: uppercase;
                    font-weight: 600;color:rgba(0,0,0,0.5)">go to the  <a href="/home" style="color:#7386D5;text-decoration: none;font-weight: 600;" >home page</a>  and check the latest posts </p>
                    <p></p>
                </div>
            </div>
        </div>
    </body>
</html>
