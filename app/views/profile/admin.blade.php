@extends('layout.master')

                @section('header')

                <div class="collapse navbar-collapse " id="navbar-collapse-1">
                     <!-- MENU --> 
                     <ul class="nav navbar-nav navbar-left">
                            <li>
                                <a href="{{ action('HomeController@index')}}">
                                <i class="fa fa-home fa-fw centered"></i> Home</a>
                            </li>
                            <li><a href="{{ action('SongController@index')}}">
                            <i class="fa fa-music fa-fw centered"></i> Music</a></li>
                            <li><a href="{{ action('VideoController@index')}}">
                            <i class="fa fa-video-camera fa-fw centered"></i> Videos</a></li>
                            <li><a href="{{ action('GalleryController@index')}}">
                            <i class="fa fa-camera fa-fw centered"></i> Pictures</a></li>
                            <li class="active"><a href="{{ action('TalentController@index')}}">
                            <i class="fa fa-users fa-fw centered"></i> Talents</a></li>
                        </ul> 
                </div>

                @stop

<div class="wrapper">

    <!-- Breadcrumbs -->

    @section('search')
        <div class="breadcrumbs container">
            <div class="row" style="padding: 0 15px;">
            <div class="col-md-8 col-sm-8 col-xs-8 padding-left0">
                <a href="{{ action('HomeController@index')}}"><h2 class="pull-left padding5000 margin0"><i class="fa fa-home"></i></a> |
                <a href="{{ action('TalentController@index')}}"><span>Talents</span></a> <i class="fa fa-users"></i> | 
                <span class="" style="text-transform:capitalize;">{{$user-> username }}</span></h2>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-8-offset search-bar">
                {{Form::open(['url'=> '/search/song', 'method'=>'get', 'class'=>'navbar-form pull-right', 'role'=>'search'])}}            
                <div class="input-group">
                    {{Form::text('s-term',Input::old('username'), array('class'=>'form-control input-sm', 'placeholder'=>'') )}}
                    <div class="input-group-btn">
                        {{Form::submit('search', array('class'=>'btn btn-default btn-sm'))}}<i class="fa fa-search">
                        </i>
                    </div>
                </div>
               {{Form::close()}}
            </div>
            </div> <!-- row ends -->
        </div> <!-- container ends -->
    @stop

    <!-- content -->

    @section('content')
                    <!-- MAIN CONTENT COL-7 -->
                    <div class="col-md-7">
                        <!-- profile bio -->
                        <div class="row profile-bio margin0050">
                            <!-- PROFILE -->
                            <div class="col-lg-6 col-md-6 padding-right0">
                                <div class="row padding50">
                                <div class="col-md-3 col-sm-3 col-xs-5 profile-pic" style="padding-left:10px;">
                                {{HTML::image(isset($user->profilePhoto->image) ? $user->profilePhoto->image : 'img/user.jpg', 'Profile Image', array('class'=>'img-responsive md-margin-bottom-10'))}}
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 btn-socials profile-util padding-left0">
                                <a class="btn btn-primary btn-block btn-sm" href="{{action('ProfileController@getPhoto')}}"><i class="fa fa-user fa-xs"></i> | Change Picture</a>
                                <a class="btn btn-primary btn-block btn-sm" href="{{action('ProfileController@edit', $user->id)}}"><i class="fa fa-cog fa-xs"></i> | Edit Profile</a>
                                <a href="{{action('SongController@getNew')}}" class="upload btn btn-soundcloud btn-block btn-sm"><i class="fa fa-music fa-xs"></i> | Add Songs</a>
                                <a href="{{action('SongController@getNew')}}" class="upload btn btn-youtube btn-block btn-sm"><i class="fa fa-video-camera fa-xs"></i> | Add Videos</a>
                                <a href="{{action('SongController@getNew')}}" class="upload btn btn-facebook btn-block btn-sm"><i class="fa fa-camera fa-xs"></i> | Add Pictures</a>
                                </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="profile-desc">
                                        <h2 class="username margin0">{{$user->username}}</h2> 
                                        <h5>Real Name: <span class="uploader">{{ $user->full_name }}</span></h5>
                                        <h5>Talent: <span class="talents">{{$user->talents}}</span></h5>
                                        <div>
                                        <a class="btn btn-facebook btn-sm" href="{{$user->facebook_url}}"><i class="fa fa-facebook fa-xs"></i></a>
                                        <a class="btn btn-twitter btn-sm" href="{{$user->twitter_url}}"><i class="fa fa-twitter fa-xs"></i></a>
                                        <a class="btn btn-soundcloud btn-sm" href="{{$user->soundcloud_url}}"><i class="fa fa-soundcloud fa-xs"></i></a>
                                        <a class="btn btn-youtube btn-sm" href="{{$user->youtube_url}}"><i class="fa fa-youtube fa-xs"></i></a>
                                        </div>
                                        <hr class="hr5"> 
                                        <span class="description">{{$user->tagline}}</span>   
                                    </div>
                            </div>
                        </div><!-- profile bio ends-->
                        <!-- UPLOADS TAB NAV-->
                        <section id="" class="row profile-body">

                            <div>

                            <!-- TAB NAV -->
                            <ul class="nav nav-tabs nav-justified list-inline" role="tablist">
                                <li class="active">
                                    <a href="#songs" role="tab" data-toggle="tab">
                                    <span class="badge">{{$s_count}}</span> Songs <i class="fa fa-music"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#videos" role="tab" data-toggle="tab">
                                    <span class="badge">{{$v_count}}</span> Videos <i class="fa fa-video-camera"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#gallery" role="tab" data-toggle="tab">
                                    <span class="badge">{{$g_count}}</span> Pictures <i class="fa fa-camera"></i>
                                    </a>
                                </li>
                            </ul>

                            <!-- TAB CONTENT -->

                            <div class="tab-content">
                                <!-- SONGS Tab Start -->
                                <div id="songs" class="tab-pane active fade in padding50">
                                        @if ($songs->isEmpty())
                                            <p class="alert alert-info alert-dismissible fade in text-center" role="alert">

                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>

                                            <span class="sr-only">Close</span></button>

                                             This user has not uploaded any Song!</p>

                                        @else

                                        @foreach ($songs as $song)

                                        <ul class="row list-inline post-item">
                                            <li class="col-md-9 col-sm-9 col-xs-8">
                                                <ul class="list-inline">
                                                    <li class="pull-left col-md-2 col-xs-4">
                                                        {{ HTML::image($song->image, $song->title, array('class'=>'thumbnail img-responsive')) }} 
                                                    </li>
                                                    <li class="pull-left col-md-10 col-xs-8">
                                                        <h3>{{ HTML::linkAction('SongController@showSong', $song->title, array($song->id), array('class'=>'post-title'))}}</h3>
                                                        <p class="post-desc hidden-xs">{{ $song->description}}</p>
                                                        <div class="btn-group list-unstyled">
                                                            <a href="{{action('SongController@delete', $song->id) }}" 
                                                            class="upload btn btn-youtube rounded btn-xs btn-block" type="button">
                                                            Delete <i class="fa fa-times centered"></i></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="col-md-3 col-sm-3 col-xs-4 post-util">
                                                <ul class="row list-inline">
                                                    <li class="col-md-4 play-icon text-right">
                                                        {{ HTML::linkAction('SongController@showSong', '', array($song->id), array('class'=>'fa fa-play-circle fa-3x'))}}
                                                    </li>
                                                    <li class="col-8 text-left"><em>{{ $song->timeago }}</em></li>
                                                </ul>
                                            </li>

                                        </ul>

                                    @endforeach

                                    @endif                                

                                    <!-- Pager -->

                                    <nav class="">

                                        <ul class="pager">

                                            <li class="previous"><a href="#">Previous</a></li>

                                            <li class="next"><a href="#">Next</a></li>

                                        </ul>
                                    </nav>                            

                                </div> 

                                <!-- Songs Tab End  -->

                                <!-- VIDEOS Tab Start -->

                                <div id="videos" class="tab-pane fade in padding5000">

                

                                    @if ($videos->isEmpty())

                                      <p class="alert alert-info text-center" role="alert"> This user has not added any Video!

                                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>

                                            <span class="sr-only">Close</span></button>

                                        </p>

                                    @else

                                    <!-- Display Video -->

                                    @foreach ($videos as $video)

                                    <div class="post-thumb col-lg-3 col-md-3 col-sm-4 col-xs-6 padding05">
                                    <!-- video -->
                                    <div class="box img-responsive thumbnails" style="background: url({{$video->image}}) no-repeat 0 0; background-size: 100% 100%;" width="auto" heigth="100px">
                                        <a href="{{ action('VideoController@showVideo', $video->id)}}">
                                        <div class="overlay"><span class="search"><i class="fa fa-play-circle fa-3x"></i></span></div>
                                        </a>
                                    </div>     
                                    <!-- Caption -->                           
                                    <div class="caption">
                                            <h5> {{ HTML::linkAction('VideoController@showVideo', $video->title, array($video->id), array('class'=>'post-title'))}}</h5>
                                            <p class="post-desc">
                                                <em>{{$video->timeago}}</em>
                                            </p>
                                            <div class="btn-group list-unstyled">
                                                <a href="{{action('VideoController@delete', $video->id) }}" 
                                                            class="upload btn btn-youtube rounded btn-xs btn-block" type="button">
                                                            Delete <i class="fa fa-times centered"></i></a>
                                            </div>
                                    </div>  
                                    </div>    
                                    @endforeach
                                    @endif
                                    <!-- Pager -->
                                    <nav class="">

                                        <ul class="pager">

                                            <li class="previous"><a href="#">Previous</a></li>

                                            <li class="next"><a href="#">Next</a></li>

                                        </ul>
                                    </nav>   

                                 </div>

                            <!-- GALLERY -->

                            <div id="gallery" class="tab-pane fade in padding5000">
                            <div class="row margin0">
                            @if ($galleries->isEmpty())
                            <p class="alert alert-info text-center" role="alert"> {{$user->username}} has not added any photos!

                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>

                            <span class="sr-only">Close</span></button>

                            </p>

                            @else

                            @foreach ($galleries as $gallery)

                            <div class="post-thumb col-lg-3 col-md-3 col-sm-4 col-xs-6 padding05">

                            <div class="box thumbnails img-responsive" style="background:url({{$gallery->image}}) no-repeat 50% 50%">

                                <a href="{{action('GalleryController@showGallery', array($gallery->id))}}">

                                <div class="overlay">

                                <span class="search">

                                <i class="fa fa-search fa-3x"></i></span></div></a>

                            </div>   

                                    <div class="caption">
                                    <!-- caption -->
                                    <h5>{{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array($gallery->id), array('class'=>'post-title'))}}</h5>
                                    <p class="post-desc"><em>{{$gallery->timeago}}</em></p>
                                    <div class="btn-group list-unstyled">
                                        <a href="{{action('GalleryController@delete', $gallery->id) }}" 
                                                            class="upload btn btn-youtube rounded btn-xs btn-block" type="button">
                                                            Delete <i class="fa fa-times centered"></i></a>
                                    </div>
                                    </div>                                    

                            </div>

                                        

                                        @endforeach

                                        @endif



                                        

                                     </div>

                                     <ul class="pager">

                                        <li class="previous"><a href="#">← Older</a></li>

                                        <li class="next"><a href="#">Newer →</a></li>

                                    </ul>

                               

                             </div>



                            </div>

                            </div>                     
                        </section>
                    </div>

                        @stop

                   @section('side') 

                <aside class="col-md-5">
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
                                                    {{ HTML::linkAction('GalleryController@showGallery', '', array($gallery->id), array('class'=>'fa fa-play-circle fa-3x'))}}
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

    @section('scripts2')

    <!-- jQuery Version 1.11.0 -->

    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>



    <!-- Bootstrap Core JavaScript -->

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>



    <!-- Script to Activate the Carousel -->

    <script>

    $('.carousel').carousel({

        interval: 2000; //changes the speed

    })

    </script>



   @stop



    

    

