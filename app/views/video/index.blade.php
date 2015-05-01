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
    
    </header>
    <!-- breadcrumbs -->
    <div class="breadcrumb">
      <div class="row">
       <div class="container">
        <div class="btn-group btn-breadcrumb pull-left">
            <a href="{{ action('HomeController@index')}}" class="btn btn-danger"><i class="fa fa-home"></i></a>
            <span href="#" class="btn btn-danger-reverse">Videos <i class="fa fa-video-camera"></i></span>
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
    
    <!-- posts -->
    <div id="section-3a" class="featured-posts">
        <div class="container padding-0">
          <div class="row margin05">
              <div class="col-md-9 col-xs-12 padding-0">
                <h3 class="text-center well"><i class="fa fa-video-camera"></i> Videos Categories</h3>
                <div class="featured-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#music" role="tab" data-toggle="tab">Music</a></li>
                        <li><a href="#dance" role="tab" data-toggle="tab">Dance</a></li>
                        <li><a href="#comedy" role="tab" data-toggle="tab">Comedy</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- featured videos -->

                        <!-- music -->
                        <div class="tab-pane fade active in" id="music">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($musics->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Music videos!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($musics as $music)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($music->image, $music->title, array('class'=>'img-responsive')) }}
                                                <div class="rating hidden">
                                                <ul class="list-inline rating-stars">
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                                </div> <!-- end .rating -->

                                              <figcaption>
                                                <div class="post-view">
                                                  <a href="{{ action('VideoController@showVideo', array('id'=> $music->id))}}"><i class="fa fa-play-circle fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('VideoController@showVideo', $music->title, array($music->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $music->user->username, array('id'=>$music->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$music->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- dance -->
                        <div class="tab-pane fade in" id="dance">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($dances->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Dance videos!</p>
                            @else
                            <!-- Fetch Videos -->
                            @foreach ($dances as $dance)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($dance->image, $dance->title, array('class'=>'img-responsive')) }}
                                                <div class="rating hidden">
                                                <ul class="list-inline rating-stars">
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                                </div> <!-- end .rating -->

                                              <figcaption>
                                                <div class="post-view">
                                                  <a href="{{ action('VideoController@showVideo', array('id'=> $dance->id))}}"><i class="fa fa-play-circle fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('VideoController@showVideo', $dance->title, array($dance->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $dance->user->username, array('id'=>$dance->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$dance->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- comedy -->
                        <div class="tab-pane fade in" id="comedy">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($comedies->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Comedy videos!</p>
                            @else
                            <!-- Fetch videos -->
                            @foreach ($comedies as $comedy)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($comedy->image, $comedy->title, array('class'=>'img-responsive')) }}
                                                <div class="rating hidden">
                                                <ul class="list-inline rating-stars">
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                                </ul>
                                                </div> <!-- end .rating -->

                                              <figcaption>
                                                <div class="post-view">
                                                  <a href="{{ action('VideoController@showVideo', array('id'=> $comedy->id))}}"><i class="fa fa-play-circle fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('VideoController@showVideo', $comedy->title, array($comedy->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $comedy->user->username, array('id'=>$comedy->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$comedy->timeago}}</li>
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
              <div class="col-md-3 col-xs-12 padding-0 sidebar">
                  @include('video.video-sidebar')
              </div>
          </div> <!-- ./ row ends -->            
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
