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
    @section('content')    
    <div id="" class="post-page">
        <div class="container">
          <div class="row margin05">
            <div class="col-md-9">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2 class="panel-title post-title text-left">{{$gallery->caption}} </h2>
                  </div>
                  <div class="panel-body">
                    <!-- post description -->
                    <div class="col-md-12">
                        <div class="media">
                          <div class="media-left media-top post-thumb">
                            {{HTML::image(isset($gallery->image) ? $gallery->image : null,'page pics', 
                                    array('class'=>'img-responsive thumbnail'))}}
                          </div>
                          <div class="media-body text-left">
                            <p class="post-uploader">
                                <i class="fa fa-user fa-fw"></i>
                                {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id),
                                array('class'=>'post-uploader'))}}
                            </p>
                            <p class="">{{ $gallery->description}}</p>
                            <ul class="post-util list-inline">
                                <li><i class="fa fa-comments"></i> 20 </li>
                                <li><i class="fa fa-heart"></i> 20 </li>
                                <li><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                            </ul>
                          </div>
                        </div>
                    </div>
                    <!-- post content -->
                    <div class="col-md-12">
                        <div class="post-content">
                                <div class="" style="min-height:200px; max-height:400px; width: 100%;">
                                    {{ HTML::image($gallery->image, 'Uploaded-Image', 
                                    array('class'=>'center-block img-responsive', 'width'=>'100%', 'height'=>'315px'))}} 
                                </div>
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
                            <h2 class="text-left margin0">Related Pictures</h2>
                            <div id="owl-demo" class="owl-carousel owl-theme"> 
                             @if (Session::get('error'))
                            <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('error') }}}
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                            </a></div>
                            @endif
                            
                            @if (Session::get('notice'))
                            <div class="alert"><a name="notice">{{{ Session::get('notice-song') }}}
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                             </a></div>
                            @endif

                            @if ($reCats->isEmpty())
                            <p class="alert alert-info text-center" role="alert"> There are no Related Pictures!
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                            </p>

                            @else
                            @foreach ($reCats as $reCat)         
                                    <div class="item">
                                        <div class="lazyOwl box thumbnails img-responsive" style="background:url({{asset($reCat->image)}}) no-repeat 0 0; background-size:100% 100%;" width="auto" heigth="100px">
                                        <a href="{{ action('GalleryController@showGallery', $reCat->id)}}"><div class="overlay">
                                        <span class="search">
                                        <i class="fa fa-search-plus fa-3x"></i></span></div>
                                        </a>
                                        </div>
                                        <div class="caption">
                                        <!-- caption -->
                                        <h3>{{ HTML::linkAction('SongController@showSong', $reCat->caption, array('id'=> $reCat->id), 
                                        array('class'=>'post-title'))}}</h3>
                                        <p class="post-desc"><em><!-- live date --> {{$reCat->timeago}}</em></p>
                                        </div>                                    
                                    </div>
                                    @endforeach
                                    @endif

                            </div>
                        </div>
                </div>
              </div>
              <div class="col-md-3">
                  @include('gallery.gallery-sidebar')
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