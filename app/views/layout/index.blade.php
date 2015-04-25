@extends('layout.master')
@section('nav')
@section('header')
@section('content')
        <!-- CONTENT -->
     
                <!-- MAIN CONTENT COL-8 -->
                <section id="main-content" class="jumbotron col col-lg-8">
                    <!-- CONTENT HEADER -->
                    <h2></h2>
                    <!-- TAB NAV -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="{{ action('BlogController@index')}}" role="tab" data-toggle="tab">Blogs</a></li>
                        <li><a href="{{ action('SongController@index')}}" role="tab" data-toggle="tab">Songs</a></li>
                        <li><a href="{{ action('VideoController@index')}}" role="tab" data-toggle="tab">Videos</a></li>
                        <li><a href="{{ action('GalleryController@index')}}" role="tab" data-toggle="tab">Galleries</a></li>
                    </ul>
                    <!-- TAB CONTENT -->
                    <div class="tab-content">
                        <!-- TAB 1 -->
                        @if (Session::get('error'))

            <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('error') }}}</a></div>
                @endif

                @if (Session::get('notice'))
            <div class="alert"><a name="notice">{{{ Session::get('notice') }}}</a></div>
            @endif

                        <div class="tab-pane active" id="tab1"> 
                         @if ($blogs->isEmpty())
                              <p> There are no Blog Articles! :(</p>
                            @else
                            @foreach ($blogs as $blog)                         
                            <section class="media">                            
                                <div class="media-body">
                                
                                    <!-- THUMBNAIL -->
                                    <a href="post-page.html" class="pull-left thumbnail">
                                        <img src="img/bg1-thumbnail.jpg">
                                    </a>                                
                                    <!-- TITLE -->
                                    <a href="{{ action('BlogController@showBlog', $blog->id, $blog->title )}}"><h3 class="media-heading lead text-center">{{ $blog->title }}</h3></a>
                                    <!-- DESCRIPTION -->
                                    <p class="text-left">{{ $blog->content}}</p>
                                    <!-- SOCIALS -->
                                    <p>
                                        <ul class="list-inline pull-right">
                                            <li><a href="#"><i class="glyphicon glyphicon-thumbs-up"></i><span class="">30</span></a></li>
                                            <li><a href="#"><i class="glyphicon glyphicon-thumbs-down"></i><span class="">0</span></a></li>
                                            <li><a href="#"><i class="fa fa-download fa-fw"></i></a></li>
                                            <li><button type="button" class="btn btn-default">Share
                                                <i class="fa fa-share-square fa-fw"></i></button>
                                            </li>
                                            <li><button class="btn btn-primary" type="button">
                                                     Comments <span class="badge">{{ $blog->comment_count}}</span></button>
                                            </li>
                                        </ul>
                                    </p>
                                    
                                </div>
                                 
                                <nav>
                                  <ul class="pager">
                                    <li class="previous"><a href="#">Previous</a></li>
                                    <li class="next"><a href="#">Next</a></li>
                                  </ul>
                                </nav>

                            </section>
                            @endforeach                             
                        @endif
                        </div>
                         
                    </div>
                              
                </section>
                @stop
                
                @extends('layout.side')

                 @yield('sidebar')
            