@extends('layout.master')
                @section('header')
                <div class="collapse navbar-collapse " id="navbar-collapse-1">
                     <!-- MENU --> 
                    <div class="">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active">
                                <a href="{{ action('HomeController@index')}}" class="active"><i class="fa fa-home fa-fw centered"></i> <span class="network-name"></span></a>
                            </li>
                            <li><a href="{{ action('SongController@index')}}">Music</a></li>
                            <li><a href="{{ action('VideoController@index')}}">Videos</a></li>
                            <li><a href="{{ action('GalleryController@index')}}">Pictures</a></li>
                            <li><a href="{{ action('TalentController@index')}}">Talents</a></li>                       
                        </ul>
                    </div>            
                </div>
                @stop
<div class="wrapper">
    <!-- Breadcrumbs -->
    
    <!-- content -->
    <div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h1>
                Privacy Policy of <strong>27colours.com</strong>
            </h1>
            <p>
                This Application collects some Personal Data from its Users.
            </p>
            <dl>
                <h2>
                    <strong>Personal Data collected for the following purposes and using the following services:</strong>
                </h2>
                <ul class="for_boxes cf">
                    <li class="one_line_col">
                        <ul class="for_boxes">
                            <li>
                                <div class="iconed policyicon_purpose_16">
                                    <h3>
                                        <strong>Access to third party services' accounts</strong>
                                    </h3>
                                    <ul>
                                        <li>
                                            <h3>
                                                <strong>Access to the Facebook account</strong>
                                            </h3>
                                            <p>
                                                Permissions: Likes
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="iconed policyicon_purpose_10">
                                    <h3>
                                        <strong>Contacting the User</strong>
                                    </h3>
                                    <ul>
                                        <li>
                                            <h3>
                                                <strong>Mailing List or Newsletter</strong>
                                            </h3>
                                            <p>
                                                Personal Data: Email address
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="iconed policyicon_purpose_13">
                                    <h3>
                                        <strong>Content commenting</strong>
                                    </h3>
                                    <ul>
                                        <li>
                                            <h3>
                                                <strong>Disqus</strong>
                                            </h3>
                                            <p>
                                                Personal Data: Cookie and Usage data
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="iconed policyicon_purpose_22">
                                    <h3>
                                        <strong>Content performance and features testing (A/B testing)</strong>
                                    </h3>
                                    <ul>
                                        <li>
                                            <h3>
                                                <strong>Google Website Optimizer</strong>
                                            </h3>
                                            <p>
                                                Personal Data: Cookie and Usage data
                                            </p>
                                        </li>
                                    </ul>
                                    
                                    
                                </div>
                            </li>
                            
                        </ul>
                    </li>
                </ul>
                <dt>
                    <span>.</span>
                </dt>
            </dl>
            <dl>
                <dt>
                    <h2>
                        <strong>Contact information</strong>
                    </h2>
                    <ul class="for_boxes cf">
                        <li class="one_line_col">
                            <ul class="for_boxes">
                                <li>
                                    <div class="iconed icon_owner">
                                        <h3>
                                            <strong>Data owner</strong>
                                        </h3>
                                        <p>
                                            27Colours - Lekki Phase 1 Lagos Nigeria,gbolahanalade@gmail.com
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="iub_footer">
                        <p>
                            Latest update: February 01, 2015
                        </p>
                    </div>
                </dt>
            </dl>
        </div>
    </div>
</div>
                   
            </div>  <!-- container ends -->
            </div> <!-- row ends -->
    </section>
    
</div>
    @section('scripts2')
    <!-- jQuery Version 1.11.0 -->
    <script src="{{ asset('js/jquery-1.11.0.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 2000; //changes the speed
    })
    </script>

   @stop

    
    
