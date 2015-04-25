@extends('layout.master')
@section('header')
        <title>Welcome | 27Colours</title>
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
                        <li><a href="{{ action('TalentController@index')}}"><i class=""></i> Talents</a></li>
                    </ul>
@stop
@section('content')
<div id="login" class="bckgrnd-white login">
  <div class="container-fluid">
    <div class="col-md-5 center-block">
    <form id="login" class="login center-block" method="POST" action="{{ URL::to('/users/forgot_password') }}" accept-charset="UTF-8">
        <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">       
        <div class="text-center">
            <h1 class="">Forgot Password</h1>
        </div>
            <div class="form-group">
                <div class="input-group">
                    <input required class="form-control" placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                    <span class="input-group-addon">
                        <input type="submit" value="{{{ Lang::get('confide::confide.forgot.submit') }}}">
                    </span>
                </div>
            </div>
            @if (Session::get('error'))
                <div class="alert alert-error alert-danger" role="alert">{{{ Session::get('error') }}}</div>
            @endif

            @if (Session::get('notice'))
                <div class="alert alert-info" role="alert">{{{ Session::get('notice') }}}</div>
            @endif
    </form>
    </div>
  </div>
</div>
@stop
    <!-- FOOTER - IN MASTER BLADE -->
</div> <!-- ./ wrapper ends -->

@section('scripts2')
    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
@stop   

