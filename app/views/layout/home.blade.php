@extends('layout.master')
    @section('header')
        <title>Welcome | 27Colours</title>
         <!-- navigation -->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="{{ action('HomeController@index')}}">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li><a href="{{ action('SongController@index')}}"><i class=""></i> Songs</a></li>
                        <li><a href="{{ action('VideoController@index')}}"><i class=""></i> Videos</a></li>
                        <li><a href="{{ action('GalleryController@index')}}"><i class=""></i> Pictures</a></li>
                        <li><a href="{{ action('TalentController@index')}}"><i class=""></i> Talents</a></li>
                    </ul>
    @stop
    @section('content')
    <!-- SITE DESCRIPTION -->
    <div id="section-1" class="site-desc">
        <ul class="list-inline socials-connect text-center">
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <h2 class="text-center">Become a <span class="strong">Celebrity!</span> <br><small>Upload your 
            <i class="fa fa-music"></i> Songs | 
            <i class="fa fa-video-camera"></i> Videos |     
            <i class="fa fa-camera"></i> Pictures </small> 
        </h2>
    </div>
    <!-- carousel full/page-height -->
    <div id="section-2" class="home-slider">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-xs-12">
            <div class="carousel slide" id="home-carousel" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#home-carousel" data-slide-to="1"></li>
                    <li data-target="#home-carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('img/slider-images/img-slide-31.jpg') }}" alt="Slider Image 1">
                        <!-- <div class="container">
                            <div class="carousel-caption">
                                <h2>Welcome</h2>
                                <p>Image Caption 1</p>
                                <p><a href="" class="btn btn-primary">Call to action</a></p>
                            </div>
                        </div> -->
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/slider-images/img-slide-51.jpg') }}" alt="Slider Image 2">
                        <!-- <div class="container">
                            <div class="carousel-caption">
                                <h2>Welcome</h2>
                                <p>Image Caption 2</p>
                                <p><a href="" class="btn btn-primary">Call to action</a></p>
                            </div>
                        </div> -->
                    </div>
                    <div class="item">
                        <img src="{{ asset('img/slider-images/img-slide-21.jpg') }}" alt="Slider Image 3">
                        <!-- <div class="container">
                            <div class="carousel-caption">
                                <h2>Welcome</h2>
                                <p>Image Caption 3</p>
                                <p><a href="" class="btn btn-primary">Call to action</a></p>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- <div class="container">
                <a href="#home-carousel" class="carousel-control left" role="button" data-slide="prev"><span class="nav-arrow btn btn-default fa fa-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                <a href="#home-carousel" class="carousel-control right" data-slide="next"><span class="nav-arrow btn btn-default fa fa-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                </div> -->
            </div>
            </div>
            <!-- celebrity endorsement video -->
                    <div class="col-md-4 col-xs-12">
                        <div class="video-endorsement">
                            <h3 class="video-heading">Celebrity Endorsements</h3>
                            <video controls>
                                <source src="vid/27colors-mi.mp4" type="video/mp4">
                                Your browser does not support the video element.
                            </video>
                        </div>
                    </div>
          </div> <!-- ./ row ends -->
        </div>
    </div>
    <!-- call-to-action -->
    <div id="section-3" class="call-to-action">
        <div class="container">
        <h3 class="text-center well">Register or Explore</h3>
        <div class="row">
            <div class="col-md-5 col-sm-5">
                <h4 class="text-center">New Talent ?</h4>
                <a href="{{ action('UsersController@getCreate')}}" class="btn btn-default btn-block"><i class="fa fa-plus-square"></i> 
                    Create a Profile <i class="fa fa-user"></i></a>
            </div>
            <div class="divider col-md-2"><h2>OR</h2></div>
            <div class="col-md-5 col-sm-5">
                <h4 class="text-center">Fans &amp; Talent hunters ?</h4>
                <a href="{{ action('SongController@index')}}" class="btn btn-default btn-block">Listen to Songs <i class="fa fa-music"></i></a>
                <a href="{{ action('VideoController@index')}}" class="btn btn-default btn-block">Watch Videos <i class="fa fa-video-camera"></i></a>
                <a href="{{ action('GalleryController@index')}}" class="btn btn-default btn-block">View Pictures <i class="fa fa-camera"></i></a>
            </div>
        </div>
        </div> <!-- ./ container ends -->
    </div>
    <!-- featured posts -->
    <div id="section-3a" class="featured-posts">
        <div class="container">
            <h3 class="text-center">Featured</h3>
            <div class="featured-tab">
                <ul class="nav nav-pills nav-stacked col-md-3 padding-2px">
                    <li class="active"><a href="#songs" data-toggle="tab"><i class="fa fa-music"></i> Songs</a></li>
                    <li><a href="#videos" data-toggle="tab"><i class="fa fa-video-camera"></i> Videos</a></li>
                    <li><a href="#pictures" data-toggle="tab"><i class="fa fa-camera"></i> Pictures</a></li>
                </ul>
                <div class="tab-content col-md-9 padding-2px">
                    <!-- featured songs -->
                    <div class="tab-pane fade active in" id="songs">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($songs->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Songs!</p>
                        @else
                        <!-- Fetch Songs -->
                        @foreach ($songs as $song)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($song->image, $song->title, array('class'=>'img-responsive')) }}
                                            <div class="rating">
                                            <ul class="list-inline rating-stars hidden">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <p class="post-label"><i class="fa fa-music"></i> {{$song->genre}}</p>
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('SongController@showSong', array('id'=> $song->id))}}"><i class="fa fa-music fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $song->title, array('id'=> $song->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader userinfo-name">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $song->user->username, array('id'=>$song->user->id),
                                            array('class'=>'post-uploader'))}}
                                        </p>  
                                        <ul class="post-util list-inline">
                                            <li><i class="fa fa-comments"></i> 20 </li>
                                            <li><i class="fa fa-heart"></i> 20 </li>
                                            <li><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <br>
                        <!-- pagination -->
                        {{ $songs->links() }} 
                    </div>
                    <!-- featured videos -->
                    <div class="tab-pane fade in" id="videos">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($videos->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Videos!</p>
                        @else
                        <!-- Fetch Videos -->
                        @foreach ($videos as $video)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($video->image, $video->title, array('class'=>'img-responsive')) }}
                                            <div class="rating">
                                            <ul class="list-inline rating-stars hidden">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <p class="post-label"><i class="fa fa-video-camera"></i> {{$video->genre}}</p>
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('VideoController@showVideo', array('id'=> $video->id))}}"><i class="fa fa-play-circle fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title">{{ HTML::linkAction('VideoController@showVideo', $video->title, array('id'=> $video->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $video->user->username, array('id'=>$video->user->id),
                                            array('class'=>'post-uploader'))}}
                                        </p>  
                                        <ul class="post-util list-inline">
                                            <li><i class="fa fa-comments"></i> 20 </li>
                                            <li><i class="fa fa-heart"></i> 20 </li>
                                            <li><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <!-- pagination -->
                        {{ $videos->links() }} 
                    </div>
                     <!-- featured pictures -->
                    <div class="tab-pane fade in" id="pictures">
                        <!-- Errors, Alerts -->
                        @if (Session::get('errors'))
                            <p class="alert alert-error alert-danger fade in" role="alert"><a>
                            {{{ Session::get('errors') }}}</a></p>
                        @endif
                        @if (Session::get('notices'))
                            <p class="alert alert-info fade in" role="alert"><a>
                            {{{ Session::get('notices') }}}</a></p>
                        @endif
                        @if ($galleries->isEmpty())
                            <p class="text-center alert alert-info"  role="alert"> There are no Pictures!</p>
                        @else
                        <!-- Fetch Pictures -->
                        @foreach ($galleries as $gallery)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($gallery->image, $gallery->title, array('class'=>'img-responsive')) }}
                                            <div class="rating">
                                            <ul class="list-inline rating-stars hidden">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <p class="post-label"><i class="fa fa-tag"></i> {{$gallery->cat}}</p>
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('GalleryController@showGallery', array('id'=> $gallery->id))}}"><i class="fa fa-camera fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title">{{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array('id'=> $gallery->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id),
                                            array('class'=>'post-uploader'))}}
                                        </p>  
                                        <ul class="post-util list-inline">
                                            <li><i class="fa fa-comments"></i> 20 </li>
                                            <li><i class="fa fa-heart"></i> 20 </li>
                                            <li><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                        @endif 
                        <br>
                        <p>
                        <!-- pagination -->
                        {{ $galleries->links() }} 
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Global exposure -->
    <div id="section-4" class="our-partners">
            <div class="container">
                <h3 class="text-center well">Let's expose your Talent to the World <i class="fa fa-globe"></i></h3>   
                <!-- <div id="owl-demo" class="owl-carousel">
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>
                    <div class="item"><img class="owl-lazy" src="img/thumb-150x150.png" alt=""></div>                       
                </div> -->
            </div>
    </div>
    @stop
    <!-- FOOTER - IN MASTER BLADE -->
</div> <!-- ./ wrapper ends -->
@section('scripts2')
    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('plugins/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <!-- inline script -->
    <!-- home slider -->
    <script>
        $(document).ready(function() {
            $('.carousel').carousel({
                autoPlay: true;
            });
        })
    </script>
    <!-- owl-carousel -->
    <script>
        $(document).ready(function() {            
            // 
            $("#owl-demo").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds 
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3],
                itemsTablet : [768,3],
                itemsMobile : [479,2],
                navigation: false,
                lazyLoad: true
            })
        });
        
    </script>
@stop

</body>
</html>
