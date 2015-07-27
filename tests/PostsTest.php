<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use tj_core\Models\Post;

class PostsTest extends TestCase
{
    public $_post;
    public $owner_id;
    public $title = '';
    public $description = '';

    /**
     * Create a post in setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->owner_id = static::generateRandomInteger('1234',1);
        $this->title = static::generateRandomString();
        $this->description = static::generateRandomString();
        $this->_post = \tj_core\Models\Post::create(array(
            'owner_id' => $this->owner_id,
            'title'  => $this->title,
            'description' => $this->description
        ));
    }

    /**
     * Test exact api response for user not logged in.
     *
     * @return void
     */
    public function testUnauthenticatedRequest()
    {
        $n = 1;
        $latest_post = Post::orderBy('created_at', 'DESC')->take($n)->get()->first();
        //Make request to get the latest post
        $response = $this->call('GET', '/api/post/'.$latest_post->id);
        //If not logged in, redirect to login page, 302 response code
        $this->assertEquals(302, $response->status());
    }

    /**
     * Test post create
     */
    public function testAuthenticatedRequestForCreatePost()
    {
        //Check whether the latest post is same as the one created in setUp()
        $n = 1;
        $latest_post = Post::orderBy('created_at', 'DESC')->take($n)->get()->first();
        $this->assertEquals('{"owner_id": '.$this->owner_id.',"title": "'.$this->title.'","description": "'.$this->description.'"}', '{"owner_id": '.$latest_post->owner_id.',"title": "'.$latest_post->title.'","description": "'.$latest_post->description.'"}');
    }

    /**
     * Test post update
     */
    public function testAuthenticatedRequestForUpdatePost()
    {
        //Generate new values to update
        $updated_owner_id = static::generateRandomInteger('1234',1);
        $updated_title = static::generateRandomString();
        $updated_description = static::generateRandomString();
        //Update the post
        $this->_post = \tj_core\Models\Post::updateOrCreate(['id' => $this->_post->id],array(
            'owner_id' => $updated_owner_id,
            'title'  => $updated_title,
            'description' => $updated_description
        ));
        //Check whether the latest post is same as the one updated above
        $n = 1;
        $latest_post = Post::orderBy('updated_at', 'DESC')->take($n)->get()->first();
        $this->assertEquals('{"owner_id": '.$updated_owner_id.',"title": "'.$updated_title.'","description": "'.$updated_description.'"}', '{"owner_id": '.$latest_post->owner_id.',"title": "'.$latest_post->title.'","description": "'.$latest_post->description.'"}');
    }

    /**
     * Test post delete
     */
    public function testAuthenticatedRequestForDeletePost()
    {
        //Generate new values to create a new post
        $to_delete_owner_id = static::generateRandomInteger('1234',1);
        $to_delete_title = static::generateRandomString();
        $to_delete_description = static::generateRandomString();
        //Create a new post
        $post = \tj_core\Models\Post::create(array(
            'owner_id' => $to_delete_owner_id,
            'title'  => $to_delete_title,
            'description' => $to_delete_description
        ));
        $id = $post->id;
        //Delete the new post
        \tj_core\Models\Post::destroy($id);
        //Check whether the new post was successfully deleted
        $post = \tj_core\Models\Post::find($id);
        $this->assertEquals(NULL, $post);
    }

    /**
     * Delete the post in tearDown
     */
    public function tearDown()
    {
        \tj_core\Models\Post::destroy($this->_post->id);
        parent::tearDown();
    }

}
