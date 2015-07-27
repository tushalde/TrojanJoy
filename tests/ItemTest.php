<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Database\Eloquent\Model;
use tj_core\Models\Item;

class ItemTest extends TestCase
{
    public $_item;
    public $post_id;
    public $title = '';
    public $description = '';
    public $price;
    public $status_id;
    public $pickup_location;
    public $category_id;

    /**
     * Create an item in setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->post_id = static::generateRandomInteger('1234',1);
        $this->title = static::generateRandomString();
        $this->description = static::generateRandomString();
        $this->price = static::generateRandomInteger('1234567890',2).'.'.static::generateRandomInteger('1234567890',2);
        $this->status_id = static::generateRandomInteger('01',1);
        $this->pickup_location = static::generateRandomInteger('1234',1);
        $this->category_id = static::generateRandomInteger('123456789',1);
        $this->_item = \tj_core\Models\Item::create(array(
            'post_id' => $this->post_id,
            'title'  => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'status_id' => $this->status_id,
            'pickup_location' => $this->pickup_location,
            'category_id' => $this->category_id
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
        $latest_item = Item::orderBy('created_at', 'DESC')->take($n)->get()->first();
        //Make request to get the latest post
        $response = $this->call('GET', '/api/item/'.$latest_item->id);
        //If not logged in, redirect to login page, 302 response code
        $this->assertEquals(302, $response->status());
    }

    /**
     * Test item create
     */
    public function testAuthenticatedRequestForCreateItem()
    {
        //Check whether the latest post is same as the one created in setUp()
        $n = 1;
        $latest_item = Item::orderBy('created_at', 'DESC')->take($n)->get()->first();
        $this->assertEquals('{"post_id": '.$this->post_id.',"title": "'.$this->title.'","description": "'.$this->description.'","price": "'.$this->price.'","status_id": "'.$this->status_id.'","pickup_location": "'.$this->pickup_location.'","category_id": "'.$this->category_id.'"}', '{"post_id": '.$latest_item->post_id.',"title": "'.$latest_item->title.'","description": "'.$latest_item->description.'","price": "'.$latest_item->price.'","status_id": "'.$latest_item->status_id.'","pickup_location": "'.$latest_item->pickup_location.'","category_id": "'.$latest_item->category_id.'"}');
    }

    /**
     * Test item update
     */
    public function testAuthenticatedRequestForUpdateItem()
    {
        //Generate new values to update
        $updated_post_id = static::generateRandomInteger('1234',1);
        $updated_title = static::generateRandomString();
        $updated_description = static::generateRandomString();
        $updated_price = static::generateRandomInteger('1234567890',2).'.'.static::generateRandomInteger('1234567890',2);
        $updated_status_id = static::generateRandomInteger('01',1);
        $updated_pickup_location = static::generateRandomInteger('1234',1);
        $updated_category_id = static::generateRandomInteger('123456789',1);
        //Update the post
        $this->_item = \tj_core\Models\Item::updateOrCreate(['id' => $this->_item->id],array(
            'post_id' => $updated_post_id,
            'title'  => $updated_title,
            'description' => $updated_description,
            'price' => $updated_price,
            'status_id' => $updated_status_id,
            'pickup_location' => $updated_pickup_location,
            'category_id' => $updated_category_id
        ));
        //Check whether the latest item is same as the one updated above
        $n = 1;
        $latest_item = Item::orderBy('updated_at', 'DESC')->take($n)->get()->first();
        $this->assertEquals('{"post_id": '.$updated_post_id.',"title": "'.$updated_title.'","description": "'.$updated_description.'","price": "'.$updated_price.'","status_id": "'.$updated_status_id.'","pickup_location": "'.$updated_pickup_location.'","category_id": "'.$updated_category_id.'"}', '{"post_id": '.$latest_item->post_id.',"title": "'.$latest_item->title.'","description": "'.$latest_item->description.'","price": "'.$latest_item->price.'","status_id": "'.$latest_item->status_id.'","pickup_location": "'.$latest_item->pickup_location.'","category_id": "'.$latest_item->category_id.'"}');
    }

    /**
     * Test item delete
     */
    public function testAuthenticatedRequestForDeleteItem()
    {
        //Generate new values to create a new item
        $to_delete_post_id = static::generateRandomInteger('1234',1);
        $to_delete_title = static::generateRandomString();
        $to_delete_description = static::generateRandomString();
        $to_delete_price = static::generateRandomInteger('1234567890',2).'.'.static::generateRandomInteger('1234567890',2);
        $to_delete_status_id = static::generateRandomInteger('01',1);
        $to_delete_pickup_location = static::generateRandomInteger('1234',1);
        $to_delete_category_id = static::generateRandomInteger('123456789',1);
        //Create a new item
        $item = \tj_core\Models\Item::create(array(
            'post_id' => $this->post_id,
            'title'  => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'status_id' => $this->status_id,
            'pickup_location' => $this->pickup_location,
            'category_id' => $this->category_id
        ));
        $id = $item->id;
        //Delete the new item
        \tj_core\Models\Item::destroy($id);
        //Check whether the new item was successfully deleted
        $item = \tj_core\Models\Item::find($id);
        $this->assertEquals(NULL, $item);
    }

    /**
     * Delete the user in tearDown
     */
    public function tearDown()
    {
        \tj_core\Models\Item::destroy($this->_item->id);
        parent::tearDown();
    }

}
