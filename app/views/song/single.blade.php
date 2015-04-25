@extends('layout.master')
    @section('header')
        <title>Songs | 27Colours</title>
         <!-- navigation -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{ action('HomeController@index')}}">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li class="active"><a href="{{ action('SongController@index')}}"><i class=""></i> Songs</a></li>
                        <li><a href="{{ action('VideoController@index')}}"><i class=""></i> Videos</a></li>
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
                    <h2 class="panel-title post-title text-left">{{$song->title}} </h2>
                  </div>
                  <div class="panel-body">
                    <!-- post description -->
                    <div class="col-md-12">
                        <div class="media">
                          <div class="media-left media-top post-thumb">
                            {{HTML::image(isset($song->image) ? $song->image : null,'page pics', 
                                    array('class'=>'img-responsive thumbnail'))}}
                          </div>
                          <div class="media-body text-left">
                            <p class="post-uploader">
                                <i class="fa fa-user fa-fw"></i>
                                {{ HTML::linkAction('ProfileController@show', $song->user->username, array('id'=>$song->user->id),
                                array('class'=>'post-uploader'))}}
                            </p>
                            <p class="">{{ $song->description}}</p>
                            <ul class="post-util list-inline">
                                <li><i class="fa fa-comments"></i> 20 </li>
                                <li><i class="fa fa-heart"></i> 20 </li>
                                <li><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                <li><i class="fa fa-clock-o"></i> {{$genre}}</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                    <!-- post content -->
                    <div class="col-md-12">
                        <div class="post-content well">
                            @if( isset($song->soundcloud))
                                <div class="">
                                <iframe width="100%" height="100px" scrolling="no" frameborder="no"
                                 src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/{{$song->soundcloud}}&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false">
                                </iframe>
                                </div>
                           
                                @elseif ( isset($song->song))
                                <div id="wrapper">
                                <audio class="audioplayer" preload="auto" controls style="width: 100%; margin-top:5px;">
                                    <source src="{{asset($song->song)}}"> <!-- .mp3 -->
                                    <source src="{{asset($song->song)}}"> <!-- .ogg -->
                                    <source src="{{asset($song->song)}}"> <!-- .wav -->
                                </audio>                        
                                </div>
                                @else
                                <p class="text-center alert alert-info"  role="alert"> You added an invalid Audio track/ soundcloud link!!! </p>
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
                       
                        <!-- RELATED CONTENT -->
                        <div id="recent-works" class="border-solid">
                            <h2 class="text-left margin0"> Youtube Video</h2>
                            @if( isset($video->youtube))
                            <div class="post-upld">
                                <iframe width="100%" height="315" src="//www.youtube.com/embed/{{$song->youtube}}?rel=0" frameborder="0" allowfullscreen></iframe>
                            </div>
                            @else
                            <p class="text-center alert alert-info"  role="alert"> No linked-related Videos! </p>
                            @endif 
                        </div>

                        <!-- RELATED CONTENT Slider -->
                        <div class="related-content border-solid">
                            <h2 class="">Related Songs</h2>
                            <div id="owl-demo" class="owl-carousel owl-theme"> 
                             @if ($reSongs->isEmpty())
                            <p class="alert alert-info text-center" role="alert"> There are no Related Songs!
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                            </p>

                            @else
                            @foreach ($reSongs as $reSong)         
                                    <div class="item">
                                        <div class="lazyOwl box thumbnails img-responsive" style="background:url({{asset($reSong->image)}}) no-repeat 0 0; background-size:100% 100%;" width="auto" heigth="100px">
                                        <a href="{{ action('SongController@showSong', $reSong->id)}}"><div class="overlay">
                                        <span class="search">
                                        <i class="fa fa-search-plus fa-3x"></i></span></div>
                                        </a>
                                        </div>
                                        <div class="caption">
                                        <!-- caption -->
                                        <h3>{{ HTML::linkAction('SongController@showSong', $song->title, array('id'=> $song->id), 
                                        array('class'=>'post-title'))}}</h3>
                                        <p class="post-desc">
                                        <em><!-- live date --> {{$reSong->timeago}}</em>
                                        </p>
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
                  @include('song.song-sidebar')
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