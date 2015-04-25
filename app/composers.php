<?php
 View::composer('*', function($view)
{
    $view->recentSongs = Song::take(4)->orderBy('id','desc')->get();
    $view->profileSongs = Song::take(3)->orderBy('id','desc')->get();
    $view->recentVideos = Video::take(4)->orderBy('id','desc')->get();
    $view->profileVideos = Video::take(3)->orderBy('id','desc')->get();
    $view->recentGalleries = Gallery::take(4)->orderBy('id','desc')->get();
    $view->profileGalleries = Gallery::take(3)->orderBy('id','desc')->get();
});

 

 /*View::composer('*', function($view)
{
    $tags = Tag::all();

    if(count($tags) > 0)
    {
        $tag_options = array_combine($tags->lists('id'),
                                    $tags->lists('name'));
    }
    else
    {
        $tag_options = array(null, 'Unspecified');
    }

    $view->with('tag_options', $tag_options);
});
*/