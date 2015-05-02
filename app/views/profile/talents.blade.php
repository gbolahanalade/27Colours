@extends('layout.master')
    @section('header')
        <title>Talents | 27Colours</title>
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
        <div id="section-3a" class="featured-posts">
        <div class="container padding-0">
          <div class="row margin05">
              <div class="col-md-9 col-xs-12 padding-2px">
                <h3 class="text-center well"><i class="fa fa-star"></i> Talent Categories</h3>
                <div class="featured-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#modelling" role="tab" data-toggle="tab">Models</a></li>
                        <li><a href="#singing" role="tab" data-toggle="tab">Singers</a></li>
                        <li><a href="#dancing" role="tab" data-toggle="tab">Dancers</a></li>
                        <li><a href="#comedy" role="tab" data-toggle="tab">Comedian</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- featured songs -->

                        <!-- modelling -->
                        <div class="tab-pane fade active in" id="modelling">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($models->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Talent profiles!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($models as $model)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($model->image, $model->title, array('class'=>'img-responsive')) }}
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
                                                  <a href="{{ action('ProfileController@show', $model->id)}}"><i class="fa fa-user fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $model->username, array('id'=>$model->id),
                                                array('class'=>''))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$model->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- singing -->
                        <div class="tab-pane fade in" id="singing">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($musicians->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Talent profiles!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($musicians as $musician)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($musician->image, $musician->title, array('class'=>'img-responsive')) }}
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
                                                  <a href="{{ action('ProfileController@show', $musician->id)}}"><i class="fa fa-user fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $musician->username, array('id'=>$musician->id),
                                                array('class'=>''))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$musician->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- dancing -->
                        <div class="tab-pane fade in" id="dancing">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($dancers->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Talent profiles!</p>
                            @else
                            <!-- Fetch Profiles -->
                            @foreach ($dancers as $dancer)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($dancer->image, $dancer->title, array('class'=>'img-responsive')) }}
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
                                                  <a href="{{ action('ProfileController@show', $dancer->id)}}"><i class="fa fa-user fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $dancer->username, array('id'=>$dancer->id),
                                                array('class'=>''))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$dancer->timeago}}</li>
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
                            @if ($comedians->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Talent profiles!</p>
                            @else
                            <!-- Fetch Profiles -->
                            @foreach ($comedians as $comedian)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($comedian->image, $comedian->title, array('class'=>'img-responsive')) }}
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
                                                  <a href="{{ action('ProfileController@show', $comedian->id)}}"><i class="fa fa-user fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <p class="post-uploader userinfo-name">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $comedian->username, array('id'=>$comedian->id),
                                                array('class'=>''))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$comedian->timeago}}</li>
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
                
                    <aside class="">
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
                        <!-- Featured Uploads-->
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Featured Songs</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Fetch Songs -->
                        @foreach ($recentSongs as $song)
                                <div class="col-xs-6 padding-0">
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
                                        <p class="post-uploader userinfo-details">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $song->user->username, array('id'=>$song->user->id),
                                            array('class'=>''))}}
                                        </p>  
                                        <ul class="post-util list-inline">
                                            <li><i class="fa fa-comments"></i> 20 </li>
                                            <li><i class="fa fa-heart"></i> 20 </li>
                                            <li><i class="fa fa-clock-o"></i> {{$song->timeago}}</li>
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                        </div>
                        </div>
                    </aside>
              </div>
          </div>
        </div>
        </div>    
    @stop
</div> <!-- End of wrapper -->
    @section('scripts2')
    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
   @stop

    
