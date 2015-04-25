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
      <div id="photo-upload" class="upload">
        <div class="container-fluid">
            <div class="col-md-5 center-block">
            {{Form::open( array('url' =>'/profile/upload', 'files'=> true, 'method'=>'post', 'class'=>'login-page main-content center-block')) }}
            {{Form::hidden('id', $user->id)}}
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Add Profile Photo</h2>
                        @if (Session::get('errors'))
                        <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>
                        @endif
                        @if (Session::get('notices'))
                        <div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a></div>
                        @endif
                    </div>
                    <div class="panel-body">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;">{{ HTML::image('img/user.jpg','Album Art', 
                            array('width'=>'150px', 'height'=>'150px'))}}</div>
                            <div><span class="btn btn-default btn-sm btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>{{Form::file('image')}}</span>
                            <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div> 
                    </div>
                    <div class="panel-footer">
                        <span>{{Form::submit('Submit', array('class' => 'btn btn-primary btn-sm') )}}</span>
                        <span><a href="{{ action('ProfileController@index')}}" class="btn btn-danger btn-sm">Cancel</a></span>
                    </div>
                </div>
            {{Form::close() }}
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

    <!-- Plugins -->
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
   @stop