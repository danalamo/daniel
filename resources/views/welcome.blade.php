<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="d-logo.png?v=1.1">

        <title>Daniel Alamo</title>

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
                font-size: 16px;
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

            .mypic {
                height: 10rem;
                border-radius: 50%;
                border: 2px solid;
            }

            .title {                
                font-size: 5rem;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;                
                font-size: 1rem;
                line-height: 3rem;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 2.5rem;
            }

            @media screen and (max-width: 1200px) {
                html, body {                
                    font-size: 14px;
                }
            }

            @media screen and (max-width: 500px) {
                html, body {                
                    font-size: 12px;
                }
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">            
                
                <img class="mypic m-b-md" 
                    src="https://avatars1.githubusercontent.com/u/6430396?v=4&s=460" />

                <div class="title m-b-md">
                    Laravel Developer
                </div>

                <div class="links">
                    <a href="//linkedin.com/in/dalamo">Linked In</a>
                    <a href="//github.com/danalamo">GitHub</a>
                    <a href="//laravel.com">Laravel</a>
                    <a href="//laravel-news.com">News</a>
                </div>
            </div>
        </div>
    </body>
</html>
