@extends('layout.master')
    @section('header')
        <title>Pictures | 27Colours</title>
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
                        <li class="active"><a href="{{ action('GalleryController@index')}}"><i class=""></i> Pictures</a></li>
                        <li><a href="{{ action('TalentController@index')}}"><i class=""></i> Talents</a></li>
                    </ul>
    @stop
    <!-- breadcrumbs -->
    <div class="breadcrumb">
      <div class="row padding-5">
       <div class="container padding-0">
        <div class="btn-group btn-breadcrumb pull-left">
            <a href="{{ action('HomeController@index')}}" class="btn btn-default"><i class="fa fa-home"></i></a>
            <span href="#" class="btn btn-danger-reverse">Pictures <i class="fa fa-camera"></i></span>
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
    @section('content')
        <!-- posts -->
    <div id="section-3a" class="featured-posts">
        <div class="container padding-0">
          <div class="row margin05">
              <div class="col-md-9 col-xs-12 padding-2px">
                <h3 class="text-center well"><i class="fa fa-camera"></i> Pictures Categories</h3>
                <div class="featured-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#modelling" role="tab" data-toggle="tab">Modelling</a></li>
                        <li><a href="#others" role="tab" data-toggle="tab">Others</a></li>
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
                            @if ($modelling->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Model pictures!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($modelling as $model)
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
                                                  <a href="{{ action('GalleryController@showGallery', array('id'=> $model->id))}}"><i class="fa fa-camera fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('GalleryController@showGallery', $model->caption, array($model->id), array('class'=>''))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $model->user->username, array('id'=>$model->user->id),
                                                array('class'=>'post-uploader'))}}
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
                        <!-- others -->
                        <div class="tab-pane fade active in" id="others">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($others->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no pictures!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($others as $other)
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 padding-0">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($other->image, $other->title, array('class'=>'img-responsive')) }}
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
                                                  <a href="{{ action('GalleryController@showGallery', array('id'=> $other->id))}}"><i class="fa fa-camera fa-4x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('GalleryController@showGallery', $other->caption, array($other->id), array('class'=>''))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $other->user->username, array('id'=>$other->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$other->timeago}}</li>
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
                  @include('gallery.gallery-sidebar')
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