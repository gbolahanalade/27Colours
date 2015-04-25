<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blogs', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('title', 140);
			$table->string('read_more');
			$table->text('content');
			$table->string('image');
			$table->unsignedInteger('comment_count')->default(0);
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});

		Schema::create('songs', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('title', 140);
			$table->boolean('published')->default(1);			
			$table->text('description');			
			$table->string('genre');
			$table->string('song');			
			$table->string('image');
			$table->string('soundcloud');
			$table->string('youtube');	
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');	
			$table->timestamps();
		});

		Schema::create('videos', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('title');
			$table->boolean('published')->default(1);
			$table->text('description');	
			$table->string('image');
			$table->string('video');
			$table->unsignedInteger('comment_count');
			$table->string('video_type');
			$table->string('youtube');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});
		Schema::create('galleries', function($table)
		{
			$table->increments('id')->unsigned();
			$table->boolean('published')->default(1);
			$table->text('caption');	
			$table->string('image');
			$table->unsignedInteger('comment_count');
			$table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
		});


		Schema::create('comments', function($table)
		{
			$table->increments('id')->unsigned();			
			$table->text('comment');
			$table->boolean('Is_approved');
			$table->unsignedInteger('commentable_id');
			$table->string('commentable_type');
			$table->timestamps();
		});

		Schema::create('tags', function($table)
        {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('type');
            $table->timestamps();  
        });

        Schema::create('profile_photos', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('image', 200);
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('song_tag', function($table)
       {
       		$table->increments('id')->unsigned();
            $table->unsignedInteger('song_id');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('tag_video', function($table)
        {	
        	$table->increments('id')->unsigned();
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('gallery_tag', function($table)
        {
        	$table->increments('id')->unsigned();
            $table->unsignedInteger('gallery_id');
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
        });

		/* Schema::create('blogtag', function($table)
        {
            $table->unsignedInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('tag_id');
            $table->foreign('blogtag_id')->references('id')->on('blogtags')->onDelete('cascade')->onUpdate('cascade');
        });

		Schema::create('taggables', function($table)
        {
            $table->increments('tag_id');         
            $table->unsignedInteger('taggable_id');
            $table->string('taggable_type');
            $table->timestamps();
        });

        Schema::create('song_songtag', function($table)
        {
            $table->unsignedInteger('song_id');
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('songtag_id');
            $table->foreign('songtag_id')->references('id')->on('songtags')->onDelete('cascade')->onUpdate('cascade');
        });


        Schema::create('videotags', function($table)
        {
            $table->increments('id');
            $table->string('name', 64);
            $table->timestamps();
        });

        Schema::create('video_videotag', function($table)
        {
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('videotag_id');
            $table->foreign('videotag_id')->references('id')->on('videotags')->onDelete('cascade')->onUpdate('cascade');
        }); */
    }

	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{	
		Schema::table('blogs', function($table)
		{
		$table->dropForeign('blogs_user_id_foreign');
		});
		Schema::drop('blogs');
	
			
		Schema::table('songs',function($table)
		{
		$table->dropForeign('songs_user_id_foreign');
		});
		Schema::drop('songs');

		Schema::table('videos',function($table)
		{
		$table->dropForeign('videos_user_id_foreign');
		});
		Schema::drop('videos');
		Schema::drop('comments');
		Schema::drop('tags');
		Schema::drop('profile_photo');

		Schema::table('song_tag',function($table)
		{
		$table->dropForeign('song_tag_song_id_foreign');
		$table->dropForeign('song_tag_tag_id_foreign');
		});
		Schema::drop('song_tag');

		Schema::table('video_tag',function($table)
		{
		$table->dropForeign('video_tag_video_id_foreign');
		$table->dropForeign('video_tag_tag_id_foreign');
		});
		Schema::drop('video_tag');

		Schema::table('gallery_tag',function($table)
		{
		$table->dropForeign('gallery_tag_gallery_id_foreign');
		$table->dropForeign('gallery_tag_tag_id_foreign');
		});
		Schema::drop('gallery_tag');
	}
}
