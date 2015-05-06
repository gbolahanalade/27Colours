@extends('layout.master')
    @section('header')
        <title>Talent Profile | 27Colours</title>
         <!-- navigation -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{ action('HomeController@index')}}">
                                <i class="fa fa-home fa-fw fa-2x"></i>
                                <span class="sr-only">(Current)</span>
                            </a>
                        </li>
                        <li><a href="{{ action('SongController@index')}}"><i class=""></i> Songs</a></li>
                        <li><a href="{{ action('VideoController@index')}}"><i class=""></i> Videos</a></li>
                        <li><a href="{{ action('GalleryController@index')}}"><i class=""></i> Pictures</a></li>
                        <li class="active"><a href="{{ action('TalentController@index')}}"><i class=""></i> Talents</a></li>
                    </ul>
    </header>
    <!-- breadcrumbs -->
    <div class="breadcrumb">
      <div class="row padding-5">
       <div class="container padding-0">
        <div class="btn-group btn-breadcrumb pull-left">
            <a href="{{ action('HomeController@index')}}" class="btn btn-default"><i class="fa fa-home"></i></a>
            <span href="#" class="btn btn-danger-reverse">Talents <i class="fa fa-star"></i></span>
        </div>
        <div class="search-bar pull-right">
                        <form class="navbar-form" action="">
                            <div class="form-group">
                            <div class="input-group">
                            <input type="text" class="form-control search-bar-event" name="Search" id='nav-search' placeholder="Search">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            </div>
                            </div>
                        </form>
        </div>
       </div>
      </div>
    </div>
    @stop
    @section('content') 
    <div class="container featured-posts"> 
    <div class="row">
    <div class="col-md-9 padding-0">
        <div class="profile-header">
          <div class="row">
            <div class="col-md-6 col-sm-6 padding-2px">
                <div class="row margin-0">
                    <div class="col-md-6 col-sm-6 col-xs-6 padding-2px profile-pic">
                        {{HTML::image(isset($user->profilePhoto->image) ? $user->profilePhoto->image : 'img/user.jpg', 
                        'Profile Image', array('class'=>'img-responsive'))}}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 padding-2px btn-socials profile-util">
                        <a class="btn btn-facebook btn-block btn-sm" href="{{$user->facebook_url}}"><i class="fa fa-facebook fa-xs"></i> | Facebook</a>
                        <a class="btn btn-twitter btn-block btn-sm" href="{{$user->twitter_url}}"><i class="fa fa-twitter fa-xs"></i> | Twitter</a>
                        <a class="btn btn-soundcloud btn-block btn-sm" href="{{$user->soundcloud_url}}"><i class="fa fa-soundcloud fa-xs"></i> | Soundcloud</a>
                        <a class="btn btn-youtube btn-block btn-sm" href="{{$user->youtube_url}}"><i class="fa fa-youtube fa-xs"></i> | Youtube</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 padding-2px">
                <h3 class="userinfo-name info-overflow">{{$user->username}}</h3> 
                <p class="userinfo-details info-overflow">Real Name: <span class="">{{ $user->full_name }}</span></p>
                <p class="userinfo-details info-overflow">Talent: <span class="">{{$user->talents}}</span></p>
                <!-- <hr class="hr5">                                 
                <span class="description userinfo-details">{{$user->tagline}}</span>  -->
            </div>
          </div>
        </div>
        <div class="profile-body padding-2px">
            <ul class="nav nav-pills nav-justified">
                <li class="active">
                    <a href="#songs" role="tab" data-toggle="tab"><span class="badge">
                    {{$s_count}}</span> Songs <i class="fa fa-music"></i></a>
                </li>
                <li><a href="#videos" role="tab" data-toggle="tab"><span class="badge">
                    {{$v_count}}</span> Videos <i class="fa fa-video-camera"></i></a>
                </li>
                <li><a href="#pictures" role="tab" data-toggle="tab"><span class="badge">
                    {{$g_count}}</span> Pitures <i class="fa fa-camera"></i></a>
                </li>
            </ul>
            <div class="tab-content">
                    <!-- featured songs -->
                    <div class="tab-pane fade active in songs" id="songs">
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
                                            <div class="rating hidden">
                                            <ul class="list-inline rating-stars">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <!-- <p class="post-label"><i class="fa fa-tag"></i> {{$song->genre}}</p> -->
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('SongController@showSong', array('id'=> $song->id))}}"><i class="fa fa-music fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="userinfo-details post-title">{{ HTML::linkAction('SongController@showSong', $song->title, array('id'=> $song->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $song->user->username, array('id'=>$song->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
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
                                            <div class="rating hidden">
                                            <ul class="list-inline rating-stars">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <!-- <p class="post-label"><i class="fa fa-tag"></i> {{$video->genre}}</p> -->
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('VideoController@showVideo', array('id'=> $video->id))}}"><i class="fa fa-play-circle fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title userinfo-details">{{ HTML::linkAction('VideoController@showVideo', $video->title, array('id'=> $video->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $video->user->username, array('id'=>$video->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
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
                        <!-- Fetch Videos -->
                        @foreach ($galleries as $gallery)
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($gallery->image, $gallery->title, array('class'=>'img-responsive')) }}
                                            <div class="rating hidden">
                                            <ul class="list-inline rating-stars">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <!-- <p class="post-label"><i class="fa fa-tag"></i> {{$gallery->cat}}</p> -->
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('GalleryController@showGallery', array('id'=> $gallery->id))}}"><i class="fa fa-camera fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title userinfo-details">{{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array('id'=> $gallery->id), array('class'=>''))}}</h4>
                                        <p class="post-uploader">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id),
                                            array('class'=>'post-uploader userinfo-details'))}}
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
                        <!-- pagination -->
                        
                    </div>
            </div>
        </div>
    </div> 
    <div class="col-md-3 col-xs-12 padding-5 sidebar">
        <!-- Celebrity Endorsements -->
                        <div class="embed-responsive embed-responsive-16by9" style="margin: 0 0 5px 0; min-height:320px;">
                            <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- Facebook Like box -->
                        <div class="fb-widget">
                          <div class="fb-page" data-href="https://www.facebook.com/27colours" 
                            data-width="250" data-height="250" data-hide-cover="false" 
                            data-show-facepile="true" data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/27colours">
                            <a href="https://www.facebook.com/27colours">27 colours</a></blockquote>
                            </div>
                          </div>
                        </div>                         
                        <div class="recent-uploads panel panel-default">
                            <div class="panel-heading text-center">
                            <h2 style="well">Featured Entries</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="#rsongs" data-toggle="tab"><i class="fa fa-music"></i> Songs</a></li>
                                <li><a href="#rvideos" data-toggle="tab"><i class="fa fa-video-camera"></i> Videos</a></li>
                                <li><a href="#rpictures" data-toggle="tab"><i class="fa fa-camera"></i> Pictures</a></li>
                            </ul>
                            </div>
                            <div class="tab-content panel-body">
                                <div id="rsongs" class="tab-pane active fade in">
                                    @foreach ($songs as $song)
                                    <div class="media sidebar-thumb">
                                        <a class="" href="">{{ HTML::image($song->image, $song->title, 
                                            array('class'=>'img-responsive pull-left media-object')) }}</a>
                                        <div class="media-body info-overflow">
                                            <h4 class="media-heading post-title">
                                                {{ HTML::linkAction('SongController@showSong', $song->title, array('id'=> $song->id), array('class'=>''))}}
                                            </h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $song->user->username, array('id'=>$song->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline userinfo-details">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>                                    
                                    @endforeach
                                </div>
                                <div id="rvideos" class="tab-pane fade in">
                                    <!-- Fetch Videos -->
                                    @foreach ($recentVideos as $video)
                                        <div class="media sidebar-thumb">
                                            <a class="" href="">{{ HTML::image($video->image, $video->title, 
                                                array('class'=>'img-responsive pull-left media-object')) }}</a>
                                            <div class="media-body info-overflow">
                                                <h4 class="media-heading post-title">
                                                    {{ HTML::linkAction('VideoController@showVideo', $video->title, array('id'=> $video->id), array('class'=>''))}}
                                                </h4>
                                                <p class="post-uploader">
                                                    <i class="fa fa-user fa-fw"></i>
                                                    {{ HTML::linkAction('ProfileController@show', $video->user->username, array('id'=>$video->user->id),
                                                    array('class'=>'post-uploader'))}}
                                                </p>  
                                                <ul class="post-util list-inline userinfo-details">
                                                    <li><i class="fa fa-comments"></i> 20 </li>
                                                    <li><i class="fa fa-heart"></i> 20 </li>
                                                    <li><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                                </ul>
                                            </div>
                                        </div>  
                                    @endforeach
                                </div>
                                <div id="rpictures" class="tab-pane fade in">
                                    <!-- Fetch Pictures -->
                                    @foreach ($recentGalleries as $gallery)
                                        <div class="media sidebar-thumb">
                                            <a class="" href="">{{ HTML::image($gallery->image, $gallery->title, 
                                                array('class'=>'img-responsive pull-left media-object')) }}</a>
                                            <div class="media-body info-overflow">
                                                <h4 class="media-heading post-title">
                                                    {{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array('id'=> $gallery->id), array('class'=>''))}}
                                                </h4>
                                                <p class="post-uploader">
                                                    <i class="fa fa-user fa-fw"></i>
                                                    {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id),
                                                    array('class'=>'post-uploader'))}}
                                                </p>  
                                                <ul class="post-util list-inline userinfo-details">
                                                    <li><i class="fa fa-comments"></i> 20 </li>
                                                    <li><i class="fa fa-heart"></i> 20 </li>
                                                    <li><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                                </ul>
                                            </div>
                                        </div>  
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- recent uploads end -->                      
    </div> 
    </div> <!-- ./ row ends -->
    </div> <!-- ./ container ends -->
    @stop
    <!-- FOOTER - IN MASTER BLADE -->
</div> <!-- ./ wrapper ends -->

@section('scripts2')
    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
   @stop

    
    
