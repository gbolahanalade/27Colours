<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <title>Login | 27 Colours</title>

   <!-- Bootstrap Core & CSS Global Compulsory -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body id="">

    <!--=== Content Part ===-->    
<div class="container">
    <form action="">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-title">
                
            </div>
        </div>
    </form>

    <!-- LOGIN TAB-->
<div class="">
        <div class="">
        <h2>Sign In</h2>
        <ul class="social-icons text-center">
            <li><a class="rounded-x social_facebook" data-original-title="Facebook" href="#"></a></li>
            <li><a class="rounded-x social_twitter" data-original-title="Twitter" href="#"></a></li>
            <li><a class="rounded-x social_googleplus" data-original-title="Google Plus" href="#"></a></li>
            <li><a class="rounded-x social_linkedin" data-original-title="Linkedin" href="#"></a></li>
        </ul>
        <p>Don't Have Account? Click {{ HTML::linkRoute('registration', 'Registration' )}} to register.</p>            
        </div>
    <div class="input-group margin-bottom-20">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <input type="text" class="form-control" placeholder="Email">
    </div>
    <div class="input-group margin-bottom-20">
        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
        <input type="text" class="form-control" placeholder="Password">
    </div>
    <hr>
    <label class="checkbox">
        <input type="checkbox"> 
        <p>Always stay signed in</p>
    </label>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        <button type="submit" class="btn-u btn-block">Log In</button>
        </div>
    </div>
</div>
    
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="{{ asset('plugins/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script> 
<!-- JS Implementing Plugins -->           

<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
<![endif]-->
</body>

</html>

