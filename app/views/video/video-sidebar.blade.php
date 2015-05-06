<!-- Celebrity Endorsements -->
                        <div class="embed-responsive embed-responsive-16by9" style="margin: 0 0 5px 0; min-height:320px;">
                            <iframe class="embed-responsive-item" width="100%" height="250" src="//www.youtube.com/embed/xzRXKlgq7zs?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <!-- Facebook Like box -->
                        <div class="fb-widget">
                          <div class="fb-page" data-href="https://www.facebook.com/27colours" 
                            data-width="250" data-height="250" data-hide-cover="false" 
                            data-show-facepile="true" data-show-posts="false">
                            <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/27colours">
                            <a href="https://www.facebook.com/27colours">27 colours</a></blockquote>
                            </div>
                          </div>
                        </div> 
                        <!-- Featured Uploads-->
                        <div class="panel panel-default featured-posts">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Featured Videos</h3>
                        </div>
                        <div class="panel-body">
                            <!-- Fetch Videos -->
                            @foreach ($recentVideos as $video)
                                <div class="media sidebar-thumb">
                                            <a class="" href="">{{ HTML::image($video->image, $video->title, 
                                                array('class'=>'img-responsive pull-left media-object')) }}</a>
                                            <div class="media-body info-overflow">
                                                <h4 class="media-heading post-title">
                                                    {{ HTML::linkAction('VideoController@showVideo', $video->title, array('id'=> $video->id), array('class'=>''))}}
                                                </h4>
                                                <p class="post-uploader">
                                                    <i class="fa fa-user fa-fw"></i>
                                                    {{ HTML::linkAction('ProfileController@show', $video->user->username, array('id'=>$video->user->id),
                                                    array('class'=>'post-uploader'))}}
                                                </p>  
                                                <ul class="post-util list-inline userinfo-details">
                                                    <li><i class="fa fa-comments"></i> 20 </li>
                                                    <li><i class="fa fa-heart"></i> 20 </li>
                                                    <li><i class="fa fa-clock-o"></i> {{$video->timeago}}</li>
                                                </ul>
                                            </div>
                                        </div> 
                            @endforeach
                        </div>
                        </div>
