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
      <div id="edit-profile" class="">
        <div class="container-fluid">
            <div class="col-md-5 center-block">
            {{Form::open(['url' => '/profile/edit','class'=>'form login-page main-content center-block'])}}
            {{Form::hidden('id', $user->id)}}
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h2 class="panel-title">Update Profile Info</h2>
                        @if (Session::get('errors'))
                        <div class="alert alert-error alert-danger"><a name="error">{{{ Session::get('errors') }}}</a></div>
                        @endif
                        @if (Session::get('notices'))
                        <div class="alert"><a name="notice">{{{ Session::get('notices') }}}</a></div>
                        @endif
                    </div>
                    <div class="panel-body text-left">
                            <div class="form-group">
                                {{ Form::label('fname', 'First-Name:') }}
                                {{ Form::text('fname', $user->first_name, ['class' => 'form-control', 'required' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('lname', 'Last-Name:') }}
                                {{ Form::text('lname', $user->last_name, ['class' => 'form-control', 'required' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('username', 'UserName:') }}
                                {{ Form::text('username', $user->username, ['class' => 'form-control', 'required' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('talents', 'Enter your talent') }}
                                {{Form::select('talents', [
                                    'dancing' => 'Dancer',
                                    'singing'=> 'Musician',
                                    'comedy'=> 'Comedian',
                                    'modelling'=> 'Model',
                                    'others' => 'Others'], 0, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('facebook', 'Enter the full url to your Facebook profile') }}
                                {{ Form::text('facebook', $user->facebook, ['class' => 'form-control', 'placeholder'=>'Facebook']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('twitter', 'Enter the full url to your Twitter account') }}
                                {{ Form::text('twitter', $user->twitter, ['class' => 'form-control', 'placeholder'=>'Twitter']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('soundcloud', 'Enter the full url to your Soundclound account') }}
                                {{ Form::text('soundcloud', $user->soundcloud, ['class' => 'form-control', 'placeholder'=>'Soundcloud']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('youtube', 'Enter the full url to your youtube') }}
                                {{ Form::text('youtube', $user->youtube, ['class' => 'form-control', 'placeholder'=>'Youtube']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('tagline', 'Enter a brief bio') }}
                                {{ Form::text('tagline', $user->tagline, ['class' => 'form-control', 'placeholder'=>'Bio']) }}
                            </div>
                    </div>
                    <div class="panel-footer">
                        <span>{{ Form::submit('Update Profile', ['class' => 'btn btn-primary btn-sm']) }}</span>
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
   @stop