<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Profile | 27 Colours</title>

    <!-- Custom Page CSS -->    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/box-shadows.css') }}" rel="stylesheet">
    
   <!--  <link rel="stylesheet" href="plugins/fancybox/source/jquery.fancybox.css"> -->

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="">    
<div class="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <!-- HEADER 1-->    
        <div class="container">
            <div class="row">
                <!-- HEADER 1 COLUMN 1 -->    
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <a class="headmargintop logo navbar-brand navbar1-brand" href="#">
                        {{ HTML::image('img/logo.fw.png', '27 Colours', array('class'=>'img-responsive center-block')) }}</a>
                </div>
                <!-- HEADER 1 COLUMN 2 -->    
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 ">
                        <a class="navbar-brand navbar1-brand img-responsive" href="#">
                           {{ HTML::image('http://placehold.it/700x50+ADSpace', 'AD Space', array('class'=>'center-block')) }}</a>
                </div>
            </div>
        </div>
        <!-- HEADER 2 -->    
        <div class="main-menu">
          <div class="row container center-block">
                    <!-- Brand and toggle get grouped for better mobile display -->
            <!-- HEADER 2 COLUMN 1 -->  
            <div class="vert-mid col-lg-8 col-sm-8 col-xs-8">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                     <!-- MENU --> 
                     <div class="">
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="{{action('HomeController@getIndex')}}" class="active"><i class="fa fa-home fa-fw centered"></i> <span class="network-name"></span></a>
                            </li>
                            <li><a name="#songs" href="{{ action('HomeController@getIndex')}}">Songs</a></li>
                            <li><a href="#videos">Videos</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#talent">Talents</a></li>
                            
                           
                                @if(Auth::check())
                                    <li>{{ HTML::linkRoute('profile', 'Profile Page' )}}</li>
                                    <li>{{ HTML::linkRoute('logout', 'logout' )}} </li>
                                @else
                                                               
                                <li>{{ HTML::linkRoute('register', 'Registration' )}}</li>
                                <li>{{ HTML::linkRoute('login', 'Sign In' )}}</li>
                                <li><a href="uploadsong-page.html">Song Upload page</a></li>
                                <li><a href="uploadvideo-page.html">Video Upload page</a></li>
                                <li><a href="uploadpicture-page.html">Pictures Upload page</a></li>
                                @endif                          
                        </ul>
                    </div>
                     <!-- SOCIALS --> 
                    <div class="socials">
                        <ul class="socials list-inline">
                                    <li>
                                        <a href="" class=""><i class="icon-twitter fa fa-twitter fa-lg fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="" class=""><i class="icon-fb fa fa-facebook fa-lg fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><i class="icon-yt fa fa-youtube fa-lg fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><i class="icon-sc fa fa-soundcloud fa-lg fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                                    <li>
                                        <a href="#" class=""><i class="icon-inst fa fa-instagram fa-lg fa-fw"></i> <span class="network-name"></span></a>
                                    </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- HEADER 2 COLUMN 2 -->    
             <div class="col-sm-4 col-xs-4">
                     <!-- MENU --> 
                        <ul class="list-inline socials btn-group">
                            @if(Auth::check())
                                    <li class="btn-group"><button class="btn btn-default btn-xs btn-block" type="button">{{ HTML::linkRoute('logout', 'logout' )}} </button></li>

                                @else
                            <li class="btn-group">
                                <button class="upload btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Upload <i class="fa fa-upload fa-fw centered"></i></button>
                            </li>
                            <li class="btn-group">
                                <button class="upload btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Register | Sign in
                                <span class="hidden-xs hidden-sm caret"></span>
                                <i class="fa fa-user fa-fw centered"></i></button>
                                    <ul class="list-unstyled dropdown-menu" role="menu">
                                        <li><button class="btn btn-default btn-xs btn-block" type="button">{{ HTML::linkRoute('register', 'Registration' )}}</button></li>
                                        <li><button class="btn btn-default btn-xs btn-block" type="button">{{ HTML::linkRoute('login', 'Sign In' )}}</button></li>               
                                    </ul>
                            </li>
                            @endif
                        </ul>
            </div>
            
          </div>
        </div>
    </nav>
    <!-- Header -->
    <div class="breadcrumbs container">
        <h3><i class="fa fa-home"></i> | Delete <i class="fa fa-user"></i> {{$video-> id }} </h3>
    </div>
   
                        <div class="container">
                          <section class="section-padding">
                          <div class="jumbotron text-center">

                            @if (Session::get('error'))

                                <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('error') }}}</a></div>
                              @endif

                            @if (Session::get('notice'))
                            <div class="alert"><a name="notice">{{{ Session::get('notice') }}}</a></div>
                            @endif
                            
                            <h3> Do you want to delete this video ? </h3>
                            {{Form::open(['url' => '/video/delete','class'=>'form'])}}
                            {{Form::hidden('id', $video->id)}}

                             <div class="form-group">
                              {{ Form::submit('Delete video', ['class' => 'btn btn-primary']) }}
                             <a href="{{ action('ProfileController@getIndex') }}"
                                class="btn btn-danger"> No </a>
                              </div>

                             {{ Form::close() }}
                         </div>

 </section>
 </div>             
                        
                  
                    
                     

                

    <!-- Footer -->
    <footer id="main-footer">
        <div class="container">
            <div class="row">
               <!--  FOOTER LEFT COL-6 -->
                <div class="col-lg-6">
                    <p class="floatleft copyright text-muted small">
                        Copyright &copy; 27Colours 2014. All Rights Reserved
                    </p>
                </div>
               <!--  FOOTER RIGHT COL-6 -->
                <div class="footer-right col-lg-6">
                    <ul class="floatright list-inline">
                        <li>
                            <a href="#home">Contact</a>
                        </li>
                        <li class="footer-menu-divider"> | </li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider"> | </li>
                        <li>
                            <a href="#faqs">FAQS</a>
                        </li>
                        <li class="footer-menu-divider"> | </li>
                        <li>
                            <a href="#services">Sponsors</a>
                        </li>
                        <li class="footer-menu-divider"> | </li>
                        <li>
                            <a href="#">Credits</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
    
        <!-- Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 350px;">
                <div class="modal-content">      
                    <div class="modal-body"><iframe src="login-page.html" frameborder="0"></iframe></div>      
                </div>
            </div>
        </div>
        <!-- Register Modal -->
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">              
              <div class="modal-body"><iframe src="register-page.html" frameborder="0"></iframe></div>
            </div>  
          </div>
        </div>
   
        <div class="modal fade" id="uploadpicture" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" style="width: 350px;">
            <div class="modal-content">              
              <div class="modal-body"><iframe src="uploadpicture-page.html" frameborder="0"></iframe></div>
            </div>  
          </div>
        </div>
    <!-- Upload Songs Modal -->
        <div class="modal fade" id="uploadsong" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">              
              <div class="modal-body"><iframe src="uploadsong-page.html" frameborder="0"></iframe></div>
            </div>  
          </div>
        </div>
    <!-- Upload videos Modal -->
        <div class="modal fade" id="uploadvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">              
              <div class="modal-body"><iframe src="uploadvideo-page.html" frameborder="0"></iframe></div>
            </div>  
          </div>
        </div>
    
   
<!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>
    <!-- JS Global Compulsory -->           
<script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-migrate.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{ asset('assets/plugins/back-to-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}"></script>

<!-- JS Customization -->
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/plugins/fancy-box.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        FancyBox.initFancybox();      
    });
</script>
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/js/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>

</html>
