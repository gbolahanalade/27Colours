@section('side') 
                <aside class="col-md-5">
                    <!-- Home_300x250_1 -->
                        <div class="embed-responsive embed-responsive-16by9" style="margin: 0 0 5px 0; min-height:320px;">
                            <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="sidebar-widget">
                        <div class="fb-like-box" data-href="https://www.facebook.com/27colours" data-width="400" data-colorscheme="light" 
                            data-show-faces="true" data-header="true" data-stream="false" data-show-border="true" style="width:250px; min-height:300px;">
                        </div>
                        </div> 
                        <!-- Featured Uploads-->
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="text-center">Recent Photos</h3>
                        </div>
                        <div class="panel-body">
                            <div class="">
                            @foreach ($recentGalleries as $gallery)
                            <ul class="list-inline post-item">
                                <li class="col-md-9 col-xs-7">
                                    <ul class="list-inline">
                                    <li class="col-md-3 pull-left">
                                      {{ HTML::image($gallery->image, $gallery->title, array('class'=>'img-responsive thumbnail','width'=>'50px','height'=>'50px')) }}                                       
                                    </li>
                                    <li class="col-md-9 pull-left post-desc">                                    
                                        <h3>{{ HTML::linkAction('GalleryController@showGallery', $gallery->caption, array($gallery->id), array('class'=>'post-title'))}}</h3>
                                        <h5>
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ HTML::linkAction('ProfileController@show', $gallery->user->username, array('id'=>$gallery->user->id),
                                        array('class'=>'post-uploader'))}}
                                        </h5>
                                        <p class="post-desc hidden-xs"> {{$gallery->description}}</p>
                                    </li>
                                    </ul>
                                </li>
                                <li class="col-md-3 col-xs-5 post-util">
                                    <ul class="row list-inline">
                                        <li class="col-md-4 play-icon text-right">
                                            {{ HTML::linkAction('GalleryController@showGallery', '', 
                                            array($gallery->id), array('class'=>'fa fa-play-circle fa-3x'))}}
                                        </li>
                                        <li class="col-md-8 text-left">
                                            <h6 class="">{{$gallery->timeago}}</h6>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            @endforeach
                            </div>
                        </div>
                        </div>
                </aside>
                @stop