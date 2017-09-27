<!doctype html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Coding Man</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-kit.css" rel="stylesheet"/>
        <link href="assets/css/basic.css" rel="stylesheet" />
        @yield('css')
    </head>

    <body class="index-page">
        <!-- Navbar -->
        <nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/">
                        <div class="logo-container">
                            <div class="logo">
                                <img src="assets/img/logo.png" alt="Creative Tim Logo" data-html="true">
                            </div>
                            <div class="brand">
                                Coding Man
                            </div>
                        </div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navigation-index">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="components-documentation.html" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                                课程
                            </a>
                        </li>
                        <li>
                            <a href="http://demos.creative-tim.com/material-kit-pro/presentation.html?ref=utp-freebie" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                                博客
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}" class="btn btn-white btn-simple btn-just-icon">登录</a></li>
                            <li><a href="{{ route('register') }}" class="btn btn-white btn-simple btn-just-icon">注册</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-white btn-simple btn-just-icon" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="wrapper">
            <div class="header header-filter" style="background-image: url('assets/img/bg2.jpeg');">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="brand">
                                <h1>Coding Man</h1>
                                <h3>一个技术人员的成长之路</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Begin Main Content -->
            <div class="main main-raised">
                @yield('content')
            </div>
            <!-- End Main Content -->

            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                易行动出品
                            </li>
                            <li>
                                <a href="http://presentation.creative-tim.com">
                                    Since 2017
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright pull-right">
                        &copy; 版权所有，侵权者追究法律责任
                    </div>
                </div>
            </footer>
        </div>
    </body>
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js"></script>
    <script src="assets/js/material-kit.js" type="text/javascript"></script>
    @yield('js')
</html>