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

    <title> Video Upload | 27 Colours</title>

    <!-- Bootstrap Core & CSS Global Compulsory -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- CSS Page Style -->    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages/upload-page.css') }}">    

    <!-- Custom CSS -->   
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">        
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="upld-page">
    <!--=== Content Part ===-->    
<div class="container">
    <!--Upload Block-->
    <form action="{{ url('/video/create')}}" method="POST" class="upld-block">
        <!-- row start -->
        <div class="row">
            <div class="col-12">
            <!-- upload block header start -->
            <ul class="upld-block-header list-unstyled">
                <li><h2>Add Your Songs, Videos & Pictures</h2></li>
                <li><h6 class="red">Maximum 10 Uploads (Add Your Best)</h6></li>            
            </ul>
            </div>
            <hr> 
            <!-- upload section start -->
            <div id="upld-section" class="col-12 text-center">
                <h2>Upload From Computer</h2>
                <div class="upld-comp">                
                    <a class="btn btn-u btn-file btn-file-inverse" type="file" placeholder="">
                        <i class ="fa fa-upload"> Upload (Song/Video/Picture)<input type="file"></i></a>
                </div>
                <!-- separator -->
                <div class="heading upld-section-seprtr"><h2>OR</h2></div>         
                <!-- separator end -->
                <h2>Embed Your <i class="fa fa-soundcloud"></i> | <i class="fa fa-youtube"> Link Below To Upload</i></h2>
            
                <div class="text-center">
                    <div class="">
                        <!-- upload soundcloud -->
                        <div class="margin-bottom-20 input-group center-block">
                            <ul class="list-inline">
                            <li>
                                <i class="input-group-addon fa fa-soundcloud"></i><input type="text" class="" placeholder="Soundcloud Url">
                            </li>
                            <li>
                                <button class="btn-u" name="submit" type="submit">Add+</button>
                            </li>
                            </ul>
                        </div>
                        <!-- upload youtube -->
                        <div class="margin-bottom-20  input-group center-block">
                            <ul class="list-inline">
                            <li class="input-group margin-bottom-20">
                                <i class="input-group-addon fa fa-youtube"></i><input type="text" class="" placeholder="YouTube Url">
                            </li>
                            <li class="">
                                <button class="btn-u" name="submit" type="submit">Add+</button>
                            </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- upload section ends -->
            <hr> <!-- divider -->
            <!-- upload details start -->
            <h2>Upload Details</h2>
            <div class="margin-bottom-20 sky-form upld-details col-12">
            <div class="row margin-bottom-20">
                <label for="upld-title" class="control-label">Title</label>
                <input type="text" class="form-control" id="upld-title" placeholder="Enter Title (Required)">
            </div>

        </form>

        <form action="{{ url('/video/art/upload')}}" method="POST" class="upld-block">

            <div class="row">
                <div class="upld-imgbdrght col-sm-6">
                    <label for="upld-img" class="control-label">Album Art (Optional)</label>
                    <a class="btn btn-u-default btn-file btn-block " type="file" placeholder=""><img class="img-responsive" src="img/user.jpg" alt=""> <input type="file"><h6 class="text-left">Click on placeholder to add image </h6></i>
                    </a>
                </div>
                <div class="upld-tagcol col-sm-6">
                    <ul class="list-unstyled ">
                        <li>
                        <label for="upld-tags" class="control-label">Tags <i class="icon-prepend glyphicon glyphicon-tags"></i></label>
                        </li>
                        <li>
                            <textarea placeholder="Type Tags For Your Upload Here Separated With Commas" class="" rows="3"></textarea>
                        </li>
                    </ul>
                    <ul class="list-unstyled select">
                        <li><h3>Genre</h3></li>
                        <li><select class="form-control">
                            <option value="0" disabled>Genre</option>
                            <option value="1">Highlife</option>
                            <option value="2">Hip-Hop</option>
                            <option value="3">RnB</option>
                            <option value="4">Afrobeats</option>
                        </select></li>
                    </ul>
                </div>

            </div>
            </div>
            <!-- save details -->
            <footer class="text-center">
                <button class="btn-u btn-u-default" type="submit">Back</button>
                <a class="btn-u" href="#">Save</a>
            </footer>   
            
        </div> 
        <!-- Row end -->
    </form>
    <!--End Reg Block-->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery/jquery-migrate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script> 
<!-- JS Implementing Plugins -->           
<script type="text/javascript" src="{{ asset('plugins/back-to-top.js') }}"></script> 

<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
<![endif]-->


</body>

</html>
