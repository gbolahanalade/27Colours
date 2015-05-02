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
    <div id="login" class="bckgrnd-white">
        <div class="container-fluid">
            <div class="col-md-5 center-block">
              <div class="login">
                <form role="form" method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                    <input type="hidden" class="form-control" name="_token" value="{{{ Session::getToken() }}}">
                    <div class="text-center">
                        <header>
                            <h3 class="margin0 section-header">Sign in</h3>
                        </header>
                        <div class="list-inline text-center margin-bottom-10 hidden">
                            <a class="btn btn-default rounded" data-original-title="Facebook"
                                href="{{action('HomeController@loginWithFacebook')}}"><i class="fa fa-facebook"></i> Facebook</a>
                            <a class="btn rounded btn-default" data-original-title="Google"
                                href="{{action('HomeController@loginWithGoogle')}}"><i class="fa fa-google"></i> Google</a>
                        </div>
                        <p>Don't have an account? Click {{ HTML::linkRoute('register', 'here' )}} to register.</p>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input required type="text" class="form-control" 
                                placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" 
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
                    <p class="help-block">
                        <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                    </p>
                    <div class="form-group">
                       <div class="col-sm-12">
                        <input type="hidden" name="remember" value="0">
                        <div class="checkbox">
                          <label for="remember">
                            <input type="checkbox" name="remember" id="remember" value="1">
                            {{{ Lang::get('confide::confide.login.remember') }}} 
                          </label>  
                        </div>
                       </div>
                    </div>
                    @if (Session::get('error'))
                        <div class="alert alert-error alert-danger" role="alert">{{{ Session::get('error') }}}</div>
                    @endif

                    @if (Session::get('notice'))
                        <div class="alert alert-info"  role="alert">{{{ Session::get('notice') }}}</div>
                    @endif  
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">
                        {{{ Lang::get('confide::confide.login.submit') }}}</button>
                      </div>
                    </div> 
                </form>
              </div> <!-- ./ login ends -->
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

