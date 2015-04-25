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
    <!-- posts -->
    <div id="section-3a" class="featured-posts">
        <div class="container">
          <div class="row margin05">
              <div class="col-md-9">
                <h3 class="text-center">Featured</h3>
                <div class="featured-tab">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#afrobeat" data-toggle="tab">Afrobeat</a></li>
                        <li><a href="#hiphop" data-toggle="tab">Hiphop</a></li>
                        <li><a href="#rnb" role="tab" data-toggle="tab">R&B</a></li>
                        <li><a href="#gospel" role="tab" data-toggle="tab">Gospel</a></li>
                        <li><a href="#highlife" role="tab" data-toggle="tab">Highlife</a></li>
                        <li><a href="#others" role="tab" data-toggle="tab">Others</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- featured songs -->

                        <!-- afrobeats -->
                        <div class="tab-pane fade active in" id="afrobeat">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($afrobeats->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Afrobeats songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($afrobeats as $afrobeat)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($afrobeat->image, $afrobeat->title, array('class'=>'img-responsive')) }}
                                                <div class="rating">
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
                                                  <a href="{{ action('SongController@showSong', array('id'=> $afrobeat->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $afrobeat->title, array($afrobeat->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $afrobeat->user->username, array('id'=>$afrobeat->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$afrobeat->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- hiphop -->
                        <div class="tab-pane fade in" id="hiphop">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($hips->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Hiphop songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($hips as $hiphop)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($hiphop->image, $hiphop->title, array('class'=>'img-responsive')) }}
                                                <div class="rating">
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
                                                  <a href="{{ action('SongController@showSong', array('id'=> $hiphop->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $hiphop->title, array($hiphop->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $hiphop->user->username, array('id'=>$hiphop->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$hiphop->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- rnb -->
                        <div class="tab-pane fade in" id="rnb">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($rnbs->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Hiphop songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($rnbs as $rnb)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($rnb->image, $rnb->title, array('class'=>'img-responsive')) }}
                                                <div class="rating">
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
                                                  <a href="{{ action('SongController@showSong', array('id'=> $rnb->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $rnb->title, array($rnb->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $rnb->user->username, array('id'=>$rnb->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$rnb->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- gospels -->
                        <div class="tab-pane fade in" id="gospel">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($rnbs->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Hiphop songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($gospels as $gospel)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($gospel->image, $gospel->title, array('class'=>'img-responsive')) }}
                                                <div class="rating">
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
                                                  <a href="{{ action('SongController@showSong', array('id'=> $gospel->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $gospel->title, array($gospel->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $gospel->user->username, array('id'=>$gospel->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$gospel->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- highlifes -->
                        <div class="tab-pane fade in" id="highlife">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($highlifes->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Highlife songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($highlifes as $highlife)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($highlife->image, $highlife->title, array('class'=>'img-responsive')) }}
                                                <div class="rating">
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
                                                  <a href="{{ action('SongController@showSong', array('id'=> $highlife->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $highlife->title, array($highlife->id), array('class'=>'post-title'))}}</h4>
                                            <p class="post-uploader">
                                                <i class="fa fa-user fa-fw"></i>
                                                {{ HTML::linkAction('ProfileController@show', $highlife->user->username, array('id'=>$highlife->user->id),
                                                array('class'=>'post-uploader'))}}
                                            </p>  
                                            <ul class="post-util list-inline">
                                                <li><i class="fa fa-comments"></i> 20 </li>
                                                <li><i class="fa fa-heart"></i> 20 </li>
                                                <li><i class="fa fa-clock-o"></i> {{$highlife->timeago}}</li>
                                            </ul>
                                        </div>
                                    </div>
                            @endforeach
                            @endif 
                            <br>
                            <!-- pagination -->
                        </div>
                        <!-- others -->
                        <div class="tab-pane fade in" id="others">
                            <!-- Errors, Alerts -->
                            @if (Session::get('errors'))
                                <p class="alert alert-error alert-danger fade in" role="alert"><a>
                                {{{ Session::get('errors') }}}</a></p>
                            @endif
                            @if (Session::get('notices'))
                                <p class="alert alert-info fade in" role="alert"><a>
                                {{{ Session::get('notices') }}}</a></p>
                            @endif
                            @if ($highlifes->isEmpty())
                                <p class="text-center alert alert-info"  role="alert"> There are no Highlife songs!</p>
                            @else
                            <!-- Fetch Songs -->
                            @foreach ($others as $other)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="featured-post">
                                            <figure>
                                                {{ HTML::image($other->image, $other->title, array('class'=>'img-responsive')) }}
                                                <div class="rating">
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
                                                  <a href="{{ action('SongController@showSong', array('id'=> $other->id))}}"><i class="fa fa-play-circle fa-5x pulse2"></i></a>
                                                </div>
                                              </figcaption>
                                            </figure>
                                            <h4 class="post-title">{{ HTML::linkAction('SongController@showSong', $other->title, array($other->id), array('class'=>'post-title'))}}</h4>
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
              <div class="col-md-3 sidebar">
                  @include('song.song-sidebar')
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