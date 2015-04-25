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
                <form  role="form" method="POST" action="{{{ URL::to('users') }}}" accept-charset="UTF-8">
                    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                    <div class="text-center">
                        <header>
                            <h2 class="margin0">Register</h2>
                        </header>
                        <div class="list-inline text-center margin-bottom-10 hidden">
                            <a class="btn rounded btn-facebook btn-facebook-inversed" data-original-title="Facebook" 
                                href="{{action('HomeController@loginWithFacebook')}}"><i class="fa fa-facebook"></i> Facebook</a>
                            <a class="btn rounded btn-youtube btn-youtube-inversed" data-original-title="Google"
                                href="{{action('HomeController@loginWithGoogle')}}"><i class="fa fa-google"></i> Google</a>
                        </div>
                        <p>Already registered? Click {{ HTML::linkRoute('login', 'here' )}} to sign in.</p>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input required type="text" class="form-control" 
                            placeholder="{{{ Lang::get('confide::confide.username') }}}" 
                            name="username" id="username" value="{{{ Input::old('username') }}}">
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required type="email" class="form-control" 
                        placeholder="{{{ Lang::get('confide::confide.e_mail') }}}" 
                        name="email" id="email" value="{{{ Input::old('email') }}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input required type="password" class="form-control" 
                            placeholder="{{{ Lang::get('confide::confide.password') }}}" name="password" id="password">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input required type="password" class="form-control" 
                            placeholder="{{{ Lang::get('confide::confide.password_confirmation') }}}" 
                            name="password_confirmation" id="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                       <div class="col-sm-12">
                         <label for="remember">
                            <input type="checkbox" name="remember" id="remember" value="1">
                            <p>I read have the <a target="_blank" href="#">Terms and Conditions</a></p>
                         </label> 
                       </div>
                    </div>
                    @if (Session::get('error'))
                        <div class="alert alert-error alert-danger" role="alert">
                            @if (is_array(Session::get('error')))
                                {{ head(Session::get('error')) }}
                            @endif
                        </div>
                    @endif
                    @if (Session::get('notice'))
                        <div class="alert alert-info" role="alert">{{ Session::get('notice') }}</div>
                    @endif
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-default">
                        {{{ Lang::get('confide::confide.signup.submit') }}}</button>
                      </div>
                    </div> 
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