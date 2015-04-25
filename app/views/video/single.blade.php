@extends('layout.master')
    @section('header')
        <title>Videos | 27Colours</title>
         <!-- navigation -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{ action('HomeController@index')}}">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li><a href="{{ action('SongController@index')}}"><i class=""></i> Songs</a></li>
                        <li class="active"><a href="{{ action('VideoController@index')}}"><i class=""></i> Videos</a></li>
                        <li><a href="{{ action('GalleryController@index')}}"><i class=""></i> Pictures</a></li>
                        <li><a href="{{ action('TalentController@index')}}"><i class=""></i> Talents</a></li>
                    </ul>
    @stop
    @section('content')    
    <div id="" class="post-page">
        <div class="container">
          <div class="row margin05">
            <div class="col-md-9">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2 class="panel-title post-title text-left">{{$video->title}} </h2>
                  </div>
                  <div class="panel-body">
                    <!-- post description -->
                    <div class="col-md-12">
                        <div class="media">
                          <div class="media-left media-top post-thumb">
                            {{HTML::image(isset($video->image) ? $video->image : null,'page pics', 
                                    array('class'=>'img-responsive thumbnail'))}}
                          </div>
                          <div class="media-body text-left">
                            <p class="post-uploader">
                                <i class="fa fa-user fa-fw"></i>
                                {{ HTML::linkAction('ProfileController@show', $video->user->username, array('id'=>$video->user->id),
                                array('class'=>'post-uploader'))}}
                            </p>
                            <p class="">{{ $video->description}}</p>
                            <ul class="post-util list-inline">
                                <li><i class="fa fa-comments"></i> 20 </li>
                                <li><i class="fa fa-heart"></i> 20 </li>
                                <li><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                    <!-- post content -->
                    <div class="col-md-12">
                        <div class="post-content">
                            @if( isset($video->youtube))
                                <div class="">
                                    <iframe width="100%" height="315" src="//www.youtube.com/embed/{{$video->youtube}}?rel=0" 
                                    frameborder="0" allowfullscreen></iframe>
                                </div>
                           
                                @elseif ( isset($video->video))
                                <div id="wrapper">
                                  <video controls style="width: 100%; height:315px;">
                                    <source src="{{asset($video->video)}}"> <!-- .mp4 -->
                                    <source src="{{asset($video->video)}}"> <!-- .ogg -->
                                    <source src="{{asset($video->video)}}"> <!-- .wav -->
                                  </video>                         
                                </div>
                                @else
                                <p class="text-center alert alert-info"  role="alert"> You added an invalid Video or YouTube link!!! </p>
                                @endif
                        </div>
                    </div>
                  </div>
                  <div class="panel-footer">
                        <div id="sharethis" class="" style="min-height:40px;">
                            <span class='st_sharethis_hcount' displayText='ShareThis'></span>
                            <span class='st_facebook_hcount' displayText='Facebook'></span>
                            <span class='st_twitter_hcount' displayText='Tweet'></span>
                            <span class='st_fblike_hcount' displayText='Facebook Like'></span>
                        </div> 
                  </div>
                </div>
                <!-- others -->
                <div class="">
                        <!-- ADS 700 x 50-->
                        <div class="center-block">
                            <img class="img-responsive center-block" src="http://placehold.it/700x50+ADSpace">
                        </div>
                         <!-- COMMENTS -->
                        @include('discomment')

                        <!-- RELATED CONTENT Slider -->
                        <div class="related-upld border-solid">
                            <h2 class="text-left margin0">Related Videos</h2>
                            <div id="owl-demo" class="owl-carousel owl-theme"> 
                            @if ($reVideos->isEmpty())
                            <p class="alert alert-info text-center" role="alert"> There are no Related Videos!
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                            </p>
                            @else
                            @foreach ($reVideos as $reVideo)         
                                    <div class="item">
                                        <div class="lazyOwl box thumbnails img-responsive" style="background:url({{asset($reVideo->image)}}) no-repeat 0 0; background-size:100% 100%;" width="auto" heigth="100px">
                                        <a href="{{ action('VideoController@showVideo', $reVideo->id)}}"><div class="overlay">
                                        <span class="search">
                                        <i class="fa fa-search-plus fa-3x"></i></span></div>
                                        </a>
                                        </div>
                                        <div class="caption">
                                        <!-- caption -->
                                        <h5><em>{{$reVideo->caption}}</em></h5>
                                        <p class="post-desc"><em><!-- live date --> {{$reVideo->timeago}}</em></p>
                                        </div>                                    
                                    </div>
                            @endforeach
                            @endif
                            <!-- End Slider -->
                            </div>
                        </div>
                </div>
              </div>
              <div class="col-md-3">
                  @include('video.video-sidebar') 
              </div>
          </div>
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
    <script src="{{ asset('plugins/owl-carousel/js/owl.carousel.js')}}"></script>
    <!-- inline script -->
    <script>
        $(document).ready(function() {
            // owl-carousel
            $(".owl-carousel").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds 
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3]
            });
            // home slider
            $('.carousel').carousel({
                autoPlay: true;
            });
        });
    </script>
@stop