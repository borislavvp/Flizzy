
<!doctype html>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TimelineMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenLite.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/js/pixelate.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="/css/admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>



</head>

<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header" style="height: 200px;">
            <img width="350px" style="margin-left: -70px;margin-top: -75px" src="/images/logo_transparent.png">
        </div>

        <ul class="list-unstyled components" style="margin-top: -20px;">

            <li style="{{Request::is('admin') ? 'background-color: white;color: #7386D5;' : ''}}">
                <a href="/admin">Dashboard</a>
            </li>
            <li>
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Users<i class="material-icons dropdownArrow" style="font-size:20px">keyboard_arrow_down</i></a>
                <ul class="collapse list-unstyled" id="userSubmenu" style="{{Request::is('admin/users*')? 'display: block;' : ''}}">
                    <li>
                        <a href="{{route('admin.users.index')}}" style="{{Request::is('admin/users') ? 'background-color: white;color: #7386D5;' : ''}}">All Users</a>
                    </li>
                    <li>
                        <a  style="{{Request::is('admin/users/create') ? 'background-color: white;color: #7386D5;' : ''}}" href="{{route('admin.users.create')}}">Create User</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#postsSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Posts<i class="material-icons dropdownArrow" style="font-size:20px">keyboard_arrow_down</i></a>
                <ul class="collapse list-unstyled" id="postsSubmenu" style="{{Request::is('admin/posts*') || Request::is('admin/comments*')? 'display: block;' : ''}}">
                    <li>
                        <a style="{{Request::is('admin/posts') ? 'background-color: white;color: #7386D5;' : ''}}" href="{{route('admin.posts.index')}}">All Posts</a>
                    </li>
                    <li>
                        <a  style="{{Request::is('admin/posts/create') ? 'background-color: white;color: #7386D5;' : ''}}" href="{{route('admin.posts.create')}}">Create Post</a>
                    </li>
                    <li>
                        <a  style="{{Request::is('admin/comments*') ? 'background-color: white;color: #7386D5;' : ''}}" href="{{route('admin.comments.index')}}">All Comments</a>
                    </li>
                </ul>
            </li>
            <li style="{{Request::is('admin/categories') ? 'background-color: white;color: #7386D5;' : ''}}">
                <a href="{{route('admin.categories.index')}}">All Categories</a>
            </li>
        </ul>

    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <a href="/home" style="color: #636b6f;
                    padding: 0 25px;
                    font-size: 17px;
                    font-weight: 400;
                    letter-spacing: 0.7rem;
                    text-decoration: none;
                    text-transform: uppercase;"
                   onmouseover="this.style.color='black'"
                   onmouseout="this.style.color='#636b6f'"
                >HOME</a>
                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle" style="background-color: transparent;color: #636b6f;
                        font-size: 15px;
                    font-weight: 400;
                    letter-spacing: 0.1rem;
                    text-decoration: none;
                    text-transform: uppercase;" data-toggle="dropdown">
                        {{ auth()->user()->name }}
                        <i class='fas fa-user-tie'></i><i class="material-icons dropdownArrow" style="font-size:20px">keyboard_arrow_down</i></button>

                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="#">User Profile</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/auth/logout') }}">Logout</a>
                        </div>
                </div>
            </div>
        </nav>


        <div class="row">
            <div class="col-lg-12">
                <h1 class=""></h1>

                @yield('content')
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>

    <!-- Page Content -->
</div>

<!-- /#page-wrapper -->


<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
@yield('footer')


</body>

</html>