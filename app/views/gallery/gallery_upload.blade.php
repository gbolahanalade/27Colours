@extends('layout.master')
    @section('header')
        <title>Upload Picture | 27Colours</title>
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
        <div class="container-fluid padding-2px">
            <div class="col-md-5 center-block padding-0">
            {{Form::open( array('url' =>'/gallery/create', 'files'=> true, 'method'=>'post', 'id'=>'')) }}
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
                        <div class="form-group">
                         <div class="img-container"> <!-- cropper container -->
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150px; height: 150px;">
                            {{ HTML::image('img/user.jpg','Album Art', array('width'=>'150px', 'height'=>'150px'))}}</div>
                            <div><span class="btn btn-default btn-sm btn-file"><span class="fileinput-new">Select image</span>
                            <span class="fileinput-exists">Change</span>{{Form::file('image')}}</span>
                            <a href="#" class="btn btn-danger btn-sm fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                          </div> 
                          <!-- <img width="250px" height="250px" 
                            src="{{asset('img/user.jpg')}}" alt="Picture"> -->
                        <!-- {{ HTML::image('img/user.jpg','Album Art', array('width'=>'150px', 'height'=>'150px'))}} -->
                         </div> <!-- ./ cropper container -->
                        <p class="help-block">*Required</p>
                        </div>
                        <div class="form-group">
                         <div class="row">
                          <div class="col-md-9 docs-buttons">
                            <!-- <h3 class="page-header">Toolbar:</h3> -->
                            <div class="btn-group">
                              <button class="btn btn-primary" data-method="setDragMode" data-option="move" type="button" title="Move">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
                                  <span class="icon icon-move"></span>
                                </span>
                              </button>
                              <button class="btn btn-primary" data-method="setDragMode" data-option="crop" type="button" title="Crop">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
                                  <span class="icon icon-crop"></span>
                                </span>
                              </button>
                              <button class="btn btn-primary" data-method="zoom" data-option="0.1" type="button" title="Zoom In">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, 0.1)">
                                  <span class="icon icon-zoom-in"></span>
                                </span>
                              </button>
                              <button class="btn btn-primary" data-method="zoom" data-option="-0.1" type="button" title="Zoom Out">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;zoom&quot;, -0.1)">
                                  <span class="icon icon-zoom-out"></span>
                                </span>
                              </button>
                              <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button" title="Rotate Left">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, -45)">
                                  <span class="icon icon-rotate-left"></span>
                                </span>
                              </button>
                              <button class="btn btn-primary" data-method="rotate" data-option="45" type="button" title="Rotate Right">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;rotate&quot;, 45)">
                                  <span class="icon icon-rotate-right"></span>
                                </span>
                              </button>
                            </div>

                            <div class="btn-group">
                              
                              <button class="btn btn-primary" data-method="clear" type="button" title="Clear">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;clear&quot;)">
                                  <span class="icon icon-remove"></span>
                                </span>
                              </button>
                              <button class="btn btn-primary" data-method="reset" type="button" title="Reset">
                                <span class="docs-tooltip" data-toggle="tooltip" title="$().cropper(&quot;reset&quot;)">
                                  <span class="icon icon-refresh"></span>
                                </span>
                              </button>
                              <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                <input class="sr-only" id="inputImage" name="file" type="file" accept="image/*">
                                <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
                                  <span class="icon icon-upload"></span>
                                </span>
                              </label>
                            </div>

                            <!-- Show the cropped image in modal -->
                            <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type="button" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
                                  </div>
                                  <div class="modal-body"></div>
                                  <!-- <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal" type="button">Close</button>
                                  </div> -->
                                </div>
                              </div>
                            </div><!-- /.modal -->

                          </div><!-- /.docs-buttons -->
                         </div>
                        </div>
                        <div class="form-group text-left">
                            {{Form::text('caption','', array('class'=>'form-control', 'required'=>'','width'=> '100%', 'margin-left'=> '25%', 'placeholder'=>'Caption'))}}
                            <p class="help-block">*Required</p>
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label">Choose Category</label>
                            {{Form::select('category', ['modelling' => 'Modelling','others' => 'Others'], 0, ['class' => 'form-control']) }}
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
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- jquery ui -->
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    

    <!-- Plugins -->
    <script src="{{ asset('plugins/jasny-bootstrap/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugins/cropper/js/cropper.js') }}"></script>
    <script src="{{ asset('plugins/cropper/js/main.js') }}"></script>
    
@stop