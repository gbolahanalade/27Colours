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
    </header>
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
    @stop
    @section('content')    
    <div id="section-3a" class="featured-posts">
        <div class="container padding-2px">
          <div class="row">
            <div class="col-md-9 col-xs-12">
                <!-- post-content -->
                   <div class="post-content">
                       <div class="post-picture">
                            {{ HTML::image($gallery->image, 'Uploaded-Image', 
                                    array('class'=>'center-block img-responsive'))}} 
                       </div>
                       <div class="post-details">
                           <h3 class="post-title text-left">{{$gallery->caption}} </h3>
                           <hr class="hr5">
                           <div class="media media-left">
                               {{HTML::image(isset($gallery->image) ? $gallery->image : null,'thumbnail', 
                                    array('class'=>'img-responsive thumbnail media-object pull-left'))}}
                                <div class="media-body">
                                    <p><i class="fa fa-user fa-fw"></i>
                                    {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id),
                                    array('class'=>'media-heading userinfo-name'))}}</p>
                                    <p class="post-util"><label for="genre">Category: </label> <span class="tag"> {{ $gallery->cat}}</span></p>
                                    <ul class="post-util list-inline">
                                        <li><i class="fa fa-comments"></i> 20 </li>
                                        <li><i class="fa fa-heart"></i> 20 </li>
                                        <li><i class="fa fa-clock-o"></i> {{$gallery->timeago}}</li>
                                    </ul>
                                </div>
                           </div>
                           <hr class="hr5">
                           <div class="post-util share-btn">
                                <label class='  ' displayText='ShareThis' style="margin-bottom:25px;vertical-align:middle;">
                                    Share <i class="fa fa-share-alt"></i></label>
                                <span class='st_facebook_large' displayText='Facebook'></span>
                                <span class='st_twitter_large' displayText='Tweet'></span>
                                <span class='st_googleplus_large' displayText='Google +'></span>
                                <span class='st_instagram_large' displayText='Instagram Badge' st_username='27colours'></span>
                           </div>
                       </div>
                   </div>
                   <!-- Post AD -->
                   <div class="post-ad">
                       
                   </div>
                   <!-- related posts -->
                   <div class="related-posts">
                       <h2 class="text-left post-section-title"><span>Related Pictures</span></h2>
                        <div id="owl-demo" class="owl-carousel"> 
                            @if ($reCats->isEmpty())
                            <p class="alert alert-info text-center" role="alert"> There are no related Pictures!
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span></button>
                            </p>
                            @else
                            @foreach ($reCats as $reCat)
                                <div class="item padding-0">
                                    <div class="featured-post">
                                        <figure>
                                            {{ HTML::image($reCat->image, $reCat->caption, array('class'=>'img-responsive lazy-owl')) }}
                                            <div class="rating hidden">
                                            <ul class="list-inline rating-stars">
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-half-o"></i></a></li>
                                              <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                            </ul>
                                            <!-- <p class="post-label"><i class="fa fa-tag"></i> {{$gallery->genre}}</p> -->
                                            </div> <!-- end .rating -->

                                          <figcaption>
                                            <div class="post-view">
                                              <a href="{{ action('GalleryController@showGallery', $reCat->id)}}"><i class="fa fa-camera fa-4x pulse2"></i></a>
                                            </div>
                                          </figcaption>
                                        </figure>
                                        <h4 class="post-title userinfo-details">{{ HTML::linkAction('GalleryController@showGallery', $reCat->caption, array('id'=> $reCat->id), array('class'=>''))}}</h4>
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
                        </div>
                    </div>
                   <!-- comments section -->
                   <div class="post-comments">
                        @include('discomment')
                   </div> 
            </div>
            <div class="col-md-3 col-xs-12 sidebar">
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
    <script src="{{ asset('plugins/owl-carousel/js/owl.carousel.min.js')}}"></script>
    <!-- inline script -->
    <script>
        $(document).ready(function() {
            // owl-carousel
            $("#owl-demo").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds 
                items : 4,
                itemsDesktop : [1199,3],
                itemsDesktopSmall : [979,3],
                itemsTablet : [768,3],
                itemsMobile : [479,2],
                navigation: false,
                lazyLoad: true
            });
        });
    </script>
@stop