@extends('layout.master')
    @section('header')
        <title>Profile | 27Colours</title>
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
    @stop
    @section('content') 
    <div class="container featured-posts"> 
    <div class="row">
    <div class="col-md-9 padding-2px">
        <div class="profile-header">
          <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6 profile-pic padding-2px">
                        {{HTML::image(isset($user->profilePhoto->image) ? $user->profilePhoto->image : 'img/user.jpg', 
                        'Profile Image', array('class'=>'img-responsive'))}}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 btn-socials profile-util padding-2px">
                        <a class="btn btn-primary btn-block btn-sm" href="{{action('ProfileController@getPhoto')}}"><i class="fa fa-user fa-xs"></i> | Change Picture</a>
                        <a class="btn btn-primary btn-block btn-sm" href="{{action('ProfileController@edit', $user->id)}}"><i class="fa fa-cog fa-xs"></i> | Edit Profile</a>
                        <a href="{{action('SongController@getNew')}}" class="upload btn btn-soundcloud btn-block btn-sm"><i class="fa fa-music fa-xs"></i> | Add Songs</a>
                        <a href="{{action('VideoController@getNew')}}" class="upload btn btn-youtube btn-block btn-sm"><i class="fa fa-video-camera fa-xs"></i> | Add Videos</a>
                        <a href="{{action('GalleryController@getNew')}}" class="upload btn btn-facebook btn-block btn-sm"><i class="fa fa-camera fa-xs"></i> | Add Pictures</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="username">{{$user->username}}</h3> 
                <h6><strong>Real Name:</strong> <span class="uploader">{{ $user->full_name }}</span></h6>
                <h6><strong>Talent:</strong> <span class="talents">{{$user->talents}}</span></h6>
                <div>
                    <a class="btn btn-facebook btn-sm" href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook fa-xs"></i></a>
                    <a class="btn btn-twitter btn-sm" href="{{$user->twitter}}" target="_blank"><i class="fa fa-twitter fa-xs"></i></a>
                    <a class="btn btn-soundcloud btn-sm" href="{{$user->soundcloud}}" target="_blank"><i class="fa fa-soundcloud fa-xs"></i></a>
                    <a class="btn btn-youtube btn-sm" href="{{$user->youtube}}" target="_blank"><i class="fa fa-youtube fa-xs"></i></a>
                </div>
                <hr class="hr5">                                 
                <span class="description">{{$user->tagline}}</span> 
            </div>
          </div>
        </div>
        <div class="profile-body">
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
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($song->image, $song->title, array('class'=>'img-responsive')) }}
                                            <div class="rating">
                                            <ul class="list-inline rating-stars">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <p class="post-label"><i class="fa fa-tag"></i> {{$song->genre}}</p>
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('SongController@showSong', array('id'=> $song->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $song->title, array('id'=> $song->id), array('class'=>'post-title'))}}</h4>
                                        <p class="post-uploader">
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
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($video->image, $video->title, array('class'=>'img-responsive')) }}
                                            <div class="rating">
                                            <ul class="list-inline rating-stars">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <p class="post-label"><i class="fa fa-tag"></i> {{$video->genre}}</p>
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('VideoController@showVideo', array('id'=> $video->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title">{{ HTML::linkAction('VideoController@showVideo', $video->title, array('id'=> $video->id), array('class'=>'post-title'))}}</h4>
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
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($gallery->image, $gallery->title, array('class'=>'img-responsive')) }}
                                            <div class="rating">
                                            <ul class="list-inline rating-stars">
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
                                              <a href="{{ action('GalleryController@showGallery', array('id'=> $gallery->id))}}"><i class="fa fa-camera fa-5x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title">{{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array('id'=> $gallery->id), array('class'=>'post-title'))}}</h4>
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
                        <!-- pagination -->
                        
                    </div>
                </div>
        </div>
    </div> 
    <div class="col-md-3">
        @section('side') 
                    <aside class="">
                        <!-- Home_300x250_1 -->
                        <div class="embed-responsive embed-responsive-16by9" style="margin: 0 0 5px 0; min-height:320px;">
                            <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="sidebar-widget">
                        <div class="fb-like-box" data-href="https://www.facebook.com/27colours" data-width="400" data-colorscheme="light" 
                            data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" style="width:250px; min-height:300px;">
                        </div>
                        </div> 
                        
                        <div class="recent-uploads panel panel-default">
                            <div class="panel-heading">
                            <h2 style="margin:0 !important;">Recent Entries</h2>
                            <hr class="hr5">
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="active col-xs-4" style="border-bottom:none; padding: 0 !important;">
                                    <a href="#rmusic" style="border:none; backround-color:transparent; border-bottom.active:1px solid #ff0000;" role="tab" data-toggle="tab">Music</a>
                                </li>
                                <li class=" col-xs-4"><a href="#rvideos" role="tab" data-toggle="tab">Videos</a></li>
                                <li class=" col-xs-4"><a href="#rpictures" role="tab" data-toggle="tab">Pictures</a></li>
                            </ul>
                            </div>
                            <div class="tab-content panel-body">
                                <div id="rmusic" class="tab-pane active fade in">
                                    @foreach ($recentSongs as $song)
                                    <ul class="list-inline post-item">
                                        <li class="col-md-8 col-sm-8 col-xs-12">
                                            <ul class="list-inline">
                                            <li class="col-md-3 pull-left">
                                              {{ HTML::image($song->image, $song->title, array('class'=>'img-responsive thumbnail','width'=>'50px','height'=>'50px')) }}                                       
                                            </li>
                                            <li class="col-md-9 pull-left post-desc">                                    
                                                <h5>{{ HTML::linkAction('SongController@showSong', $song->title, array($song->id), array('class'=>'post-title'))}}</h5>
                                                <h5><i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $song->user->username, array('id'=>$song->user->id), array('class'=>'post-uploader'))}}</h5>
                                                <p class="post-desc hidden-xs"> {{$song->description}}</p>
                                            </li>
                                            </ul>
                                        </li>
                                        <li class="col-md-4 col-sm-4 col-xs-12 post-util">
                                            <ul class="list-inline">
                                                <li class="col-md-4 play-icon text-right">
                                                    {{ HTML::linkAction('SongController@showSong', '', array($song->id), array('class'=>'fa fa-play-circle fa-3x'))}}
                                                </li>
                                                <li class="col-md-8 text-left">
                                                    <h6 class="">{{$song->timeago}}</h6>
                                                    <!-- <h6>views 156 Views</h6> -->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                                <div id="rvideos" class="tab-pane fade in">
                                    @foreach ($recentVideos as $video)
                                    <ul class="list-inline post-item">
                                        <li class="col-md-8 col-sm-8 col-xs-12">
                                            <ul class="list-inline">
                                            <li class="col-md-3 pull-left">
                                              {{ HTML::image($video->image, $video->title, array('class'=>'img-responsive thumbnail','width'=>'50px','height'=>'50px')) }}                                       
                                            </li>
                                            <li class="col-md-9 pull-left post-desc">                                    
                                                <h5>{{ HTML::linkAction('VideoController@showVideo', $video->title, array($video->id), array('class'=>'post-title'))}}</h5>
                                                <h5><i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $video->user->username, array('id'=>$video->user->id), array('class'=>'post-uploader'))}}</h5>
                                                <p class="post-desc hidden-xs"> {{$video->description}}</p>
                                            </li>
                                            </ul>
                                        </li>
                                        <li class="col-md-4 col-sm-4 col-xs-12 post-util">
                                            <ul class="list-inline">
                                                <li class="col-md-4 play-icon text-right">
                                                    {{ HTML::linkAction('VideoController@showVideo', '', array($video->id), array('class'=>'fa fa-play-circle fa-3x'))}}
                                                </li>
                                                <li class="col-md-8 text-left">
                                                    <h6 class="">{{$video->timeago}}</h6>
                                                    <!-- <h6>views 156 Views</h6> -->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                                <div id="rpictures" class="tab-pane fade in">
                                    @foreach ($recentGalleries as $gallery)
                                    <ul class="list-inline post-item">
                                        <li class="col-md-8 col-sm-8 col-xs-12">
                                            <ul class="list-inline">
                                            <li class="col-md-3 pull-left">
                                              {{ HTML::image($gallery->image, $gallery->caption, array('class'=>'img-responsive thumbnail','width'=>'50px','height'=>'50px')) }}                                       
                                            </li>
                                            <li class="col-md-9 pull-left post-desc">                                    
                                                <h5>{{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array($gallery->id), array('class'=>'post-title'))}}</h5>
                                                <h5><i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id), array('class'=>'post-uploader'))}}</h5>
                                                <p class="post-desc hidden-xs"> {{$gallery->caption}}</p>
                                            </li>
                                            </ul>
                                        </li>
                                        <li class="col-md-4 col-sm-4 col-xs-12 post-util">
                                            <ul class="list-inline">
                                                <li class="col-md-4 play-icon text-right">
                                                    {{ HTML::linkAction('GalleryController@showGallery', '', array($gallery->id), array('class'=>'fa fa-camera fa-3x'))}}
                                                </li>
                                                <li class="col-md-8 text-left">
                                                    <h6 class="">{{$gallery->timeago}}</h6>
                                                    <!-- <h6>views 156 Views</h6> -->
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- recent uploads end -->                        
                    </aside>
        @stop
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

    
    
