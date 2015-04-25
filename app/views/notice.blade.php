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
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="alert alert-dismissable alert-warning">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>
                    Sorry!!!
                </h4> <strong>You can't upload more than 10 songs/10 Videos/ 10 pictures</strong>.
                <div>
                    You can either delete old songs/videos/pictures to add more
                </div>
                <div>
                    OR
                </div>
                <div>
                    <br />
                    <div>
                         <b>Upgrade to a premium account to Add Unlimited Songs/videos and Pictures to your profile</b>
                    </div>
<a href="{{URL::to('/profile')}}" class="alert-link">Go back to profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
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

