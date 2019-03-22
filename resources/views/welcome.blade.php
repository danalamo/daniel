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
                font-size: 11px !important;
            }
            
            body {
                background: url(background-laravel-beach.jpeg);
                background-size: cover;
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
                #background: #fffffff7;
                background: rgba(255, 255, 255, 0.94);
                border-radius: 4px;
                padding: 3rem;
                border-bottom: 8px solid #bb6a6a;
                box-shadow: 0px 0px 1px #a0a0a0;
            }

            .mypic {
                height: 10rem;
                border-radius: 50%;
                border: 2px solid;
            }

            .title {                
                font-size: 4rem;
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
                padding: 0 5px;
            }

            .m-b-md {
                margin-bottom: 2.5rem;
            }
            .round {
                border: 1px solid #626b6e;
                padding: 15px;
                border-radius: 100%;
                font-size: 1.3rem !important;
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
        <script src="https://use.fontawesome.com/94dd692c46.js"></script>
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
                    
                <img class="mypic" 
                    src="https://avatars1.githubusercontent.com/u/6430396?v=4&s=460" />
                
                <h1>Daniel Alamo</h1>
                <div class="title m-b-md">                    
                    Software Engineer
                </div>

                <div class="links">
                    <a href="//linkedin.com/in/dalamo">
                        <i class="round fa fa-linkedin"></i>
                        <!-- Linked In -->
                    </a>
                    <a href="//github.com/danalamo">
                        <i class="round fa fa-github"></i>
                        <!-- GitHub -->
                    </a>
                    <a href="//bitbucket.org/danalamo">
                        <i class="round fa fa-bitbucket"></i>
                        <!-- BitBucket -->
                    </a>
                    <br><br>
                    <!--
                    <a href="/pet-store">
                        Pet Store &rarr;
                    </a>
                    -->
                    <!-- <a href="//laravel.com">Laravel</a> -->
                    <!-- <a href="//laravel-news.com">News</a> -->
                </div>
            </div>
        </div>
    </body>
</html>
