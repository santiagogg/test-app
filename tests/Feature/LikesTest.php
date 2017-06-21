<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LikesTest extends TestCase
{
    use DatabaseMigrations;


    /**
     * A guest can not do like to videos
     */
    function test_guests_can_not_like_videos()
    {
        $this->post('videos/1/likes')
            ->assertRedirect('login');
    }


    /**
     * A user can do like to a video
     */
    public function test_an_authenticated_user_can_like_any_video()
    {
        $user = factory(\App\User::class)->create();
        $this->be($user);

        $video = factory(\App\Video::class)->create();

        $this->post('videos/' . $video->id . '/likes');
        $this->assertCount(1, $video->likes);
    }
}
