<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <!-- seo -->
    <meta name="description" content="@yield('description','Looking for the next singing, dancing and modelling talents')">
    <meta name="keywords" content="@yield('keywords', 'singing, photoshoot,modelling,talent search')">
    <meta name="author" content="curiouzmindTech">

    <!-- core css -->
    <link rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.css')}}">
    <!-- custom global css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/owl.carousel.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl-carousel/css/bootstrapTheme.css')}}"> -->
    <link rel="stylesheet" href="{{asset('plugins/jasny-bootstrap/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome-4.1.0/css/font-awesome.css')}}">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,800%7COpen+Sans:400italic,400,600,700' 
        rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Sharing plugin -->
    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options(
        {publisher: "462b8e41-098f-4d6e-af7f-52472fed576a", doNotHash: false, 
        doNotCopy: false, hashAddressBar: true, displayText: "27Colours"});
    </script>
</head>
<body>
    <!-- wrapper -->
    <div class="main-wrapper">
        <header class="menu-bar">
            <!-- menu -->
            <nav class="nav navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                <div class="navbar-header">
                    <!-- logo -->
                    <a class="navbar-brand" href="{{ action('HomeController@index')}}">
                        <img class="img-responsive" src="{{asset('img/logo.png')}}" alt="Logo">
                    </a>
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                </div>
                <!-- menu navigation -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <!-- call to action -->
                    <div class="nav navbar-nav navbar-right">
                        <!-- check if logged in -->
                        @if(Auth::check())
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{HTML::image(isset(Auth::user()->profilePhoto->image) ? Auth::user()->profilePhoto->image : 'img/user.jpg', 'Profile thumbnail', array( 'class'=>'header-thumb','width'=>'38px', 'height'=>'38px'))}}
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    @if(Auth::check())
                                        <li>{{ HTML::link('/profile', 'View Profile')}}</li>                                       
                                        <li><a href="{{action('ProfileController@edit')}}"><i class="fa fa-cog fa-xs"></i> | Edit Profile</a></li>
                                        <li><a href="{{action('SongController@getNew')}}"><i class="fa fa-music fa-xs"></i> | Add Songs</a></li>
                                        <li><a href="{{action('VideoController@getNew')}}"><i class="fa fa-video-camera fa-xs"></i> | Add Videos</a></li>
                                        <li><a href="{{action('GalleryController@getNew')}}"><i class="fa fa-camera fa-xs"></i> | Add Pictures</a></li>
                                        <li>{{ HTML::linkRoute('logout', 'logout', array ('class'=>'') )}} </li>
                                    @else
                                        <li>{{ HTML::linkRoute('register', 'Registration', array('class'=>'hidden-xs hidden-sm'))}}</li>
                                        <li>{{ HTML::linkRoute('login', 'Sign In' )}}</li>
                                    @endif 
                                    </ul>
                            </div>
                        @else
                        <!-- CALL TO ACTION UPLOAD-->
                        <span class="header-call-to-action">
                          <a href="" class="btn btn-default"><i class="fa fa-upload"></i> Upload</a>
                        </span><!-- END .HEADER-CALL-TO-ACTION -->
                        <span class="header-login">
                            <i class="fa fa-power-off"></i> 
                            {{ HTML::linkRoute('login', 'Sign In')}}
                           <!--  <a href="#login" data-toggle="modal">Login</a> -->
                            <!-- <div class="modal hide" id="login">
                            <div class="modal-body">
                            <form action="#">
                              <input type="text" class="form-control" placeholder="Username">
                              <input type="password" class="form-control" placeholder="Password">
                              <input type="submit" class="btn btn-default" value="Login">
                              <a href="#" class="btn btn-link">Forgot Password?</a>
                            </form>
                            </div>
                            </div> -->
                        </span> <!-- END .HEADER-LOGIN -->
                        <!-- HEADER REGISTER -->
                        <span class="header-register">
                          <i class="fa fa-plus-square"></i> {{ HTML::linkRoute('register', 'Register' )}}

                          <!-- <div>
                            <form action="#">
                              <input type="text" class="form-control" placeholder="Username">
                              <input type="email" class="form-control" placeholder="Email">
                              <input type="password" class="form-control" placeholder="Password">
                              <input type="submit" class="btn btn-default" value="Register">
                            </form>
                          </div> -->
                        </span> <!-- END .HEADER-REGISTER -->
                        @endif
                    </div>
                    
                    @yield('header')
                </div> <!-- ./ menu navigation -->
                </div> <!-- ./ container -->
            </nav>
        