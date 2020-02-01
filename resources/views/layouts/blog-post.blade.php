<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Start Bootstrap Template</title>

    {{--<!-- Bootstrap Core CSS -->--}}
    {{--<link href="{{asset('css/libs.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('css/app.css')}}" rel="stylesheet">--}}

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
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
        .page-header { position: relative; }
        .reviews {
            color: #555;
            font-weight: bold;
            margin: 10px auto 20px;
        }
        .notes {
            color: #999;
            font-size: 12px;
        }
        .media .media-object { max-width: 120px; }
        .media-body { position: relative; }
        .media-date {
            position: absolute;
            right: 25px;
            top: 25px;
        }
        .media-date li { padding: 0; }
        .media-date li:first-child:before { content: ''; }
        .media-date li:before {
            content: '.';
            margin-left: -2px;
            margin-right: 2px;
        }
        .media-comment { margin-bottom: 20px; }
        .media-replied { margin: 0 0 20px 50px; }
        .media-replied .media-heading { padding-left: 6px; }

        .btn-circle {
            font-weight: bold;
            font-size: 12px;
            padding: 6px 15px;
            border-radius: 20px;
        }
        .btn-circle span { padding-right: 6px; }
        .embed-responsive { margin-bottom: 20px; }
        .tab-content {
            padding: 50px 15px;
            border: 1px solid #ddd;
            border-top: 0;
            border-bottom-right-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .custom-input-file {
            overflow: hidden;
            position: relative;
            width: 120px;
            height: 120px;
            background: #eee url('https://s3.amazonaws.com/uifaces/faces/twitter/walterstephanie/128.jpg');
            background-size: 120px;
            border-radius: 120px;
        }
        input[type="file"]{
            z-index: 999;
            line-height: 0;
            font-size: 0;
            position: absolute;
            opacity: 0;
            filter: alpha(opacity = 0);-ms-filter: "alpha(opacity=0)";
            margin: 0;
            padding:0;
            left:0;
        }
        .uploadPhoto {
            position: absolute;
            top: 25%;
            left: 25%;
            display: none;
            width: 50%;
            height: 50%;
            color: #fff;
            text-align: center;
            line-height: 60px;
            text-transform: uppercase;
            background-color: rgba(0,0,0,.3);
            border-radius: 50px;
            cursor: pointer;
        }
        .custom-input-file:hover .uploadPhoto { display: block; }
        .comment-reply {
            display: none; }
    </style>
</head>

<body>

<!-- Navigation -->
{{--<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">--}}
    {{--<div class="container">--}}
        {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
        {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
            {{--<ul class="nav navbar-nav">--}}
                {{--<li>--}}
                    {{--<a href="#">About</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Services</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">Contact</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
        {{--<!-- /.navbar-collapse -->--}}
    {{--</div>--}}
    {{--<!-- /.container -->--}}
{{--</nav>--}}

{{--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">--}}
    {{--<a class="navbar-brand" href="#">Navbar w/ text</a>--}}
    {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">--}}
        {{--<span class="navbar-toggler-icon"></span>--}}
    {{--</button>--}}
    {{--<div class="collapse navbar-collapse" id="navbarText">--}}
        {{--<ul class="navbar-nav mr-auto">--}}
            {{--<li class="nav-item active">--}}
                {{--<a href="{{ url('/home') }}">Home</a>--}}
            {{--</li>--}}
            {{--@if(Auth::check())--}}
                {{--@if(Auth::user()->isAdmin())--}}
                    {{--<li class="nav-item active">--}}
                        {{--<a href="{{ url('/admin') }}">Admin Panel</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--@endif--}}
        {{--</ul>--}}
        {{--<span class="navbar-text">--}}
      {{--Navbar text with an inline element--}}
    {{--</span>--}}
    {{--</div>--}}
{{--</nav>--}}

<nav class="navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}">Home</a></li>
                @if(Auth::user()->isAdmin())
                    <li>
                        <a href="{{ url('/admin') }}">Admin Panel</a>
                    </li>
                @endif

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- Page Content -->
<div class="container" style="padding-top: 50px;">

    <div class="row">

        <!-- Blog Post Content Column -->


        <div class="col-lg-8">

            @yield('content')

        </div>

    </div>
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Blog Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        @yield('categories')
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->

</div>
<footer>
    <div class="row" style="padding-top: 50px;text-align: center;">
        <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2019</p>
        </div>
    </div>
    <!-- /.row -->
</footer>
<!-- /.container -->

<!-- jQuery -->

<script src="{{asset('js/libs.js')}}"></script>


@yield('scripts')





</body>

</html>
