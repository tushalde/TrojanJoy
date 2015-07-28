<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public $_user;

    /**
     * Create a user in setup
     */
    public function setUp()
    {
        parent::setUp();
        $this->_user = \tj_core\Models\User::create(array(
            'first_name' => static::generateRandomString(),
            'last_name'  => static::generateRandomString(),
            'email' => static::generateRandomString(5). '@' . static::generateRandomString(5).'.com',
            'avatar_url' => static::generateRandomString(10)
        ));
    }

    /**
     * Test exact api response for user not logged in.
     *
     * @return void
     */
    public function testUnauthenticatedRequest()
    {
        //Make request
        $response = $this->call('GET', '/api/user/1');
        //If not logged in, redirect to login page, 302 response code
        $this->assertEquals(302, $response->status());
    }

    /**
     * Test request for users own data
     */
    public function testAuthenticatedRequest()
    {
        $this->actingAs($this->_user)
            ->visit('/api/user/1')
            ->seeJson(json_decode('{"created_at":"2015-07-07 06:59:52","email":"ryanchenkie@gmail.com","first_name":"Ryan","last_name":"Chenkie"}',true));
    }

    /**
     * Delete the user in tearDown
     */
    public function tearDown()
    {
        \tj_core\Models\User::destroy($this->_user->id);
        parent::tearDown();
    }

}
