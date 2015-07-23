<?php

namespace tj_core\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use tj_core\Http\Requests;
use tj_core\Models\User;
use Session;

class HomeController extends Controller
{

    private $_guzzle_client;
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //if logged in goto market home
        if (Auth::check()) {
            return View('market.base.home');
        }
        //else goto landing page!
        return View('core.landing-page');

    }

    /**
     * Invokable login action to complete the user login
     * @return bool
     */
    public function action_login()
    {
        $access_token = !empty($_GET['access_token']) ? $_GET['access_token'] : "";
        $token_type = !empty($_GET['token_type']) ? $_GET['token_type'] : "";
        $expires_in = !empty($_GET['expires_in']) ? $_GET['expires_in'] : "";

        //neither can be empty
        if (empty($access_token) || empty($token_type) || empty($expires_in)) {
            //Can not authenticate
            return false;
        }

        //guzzle to query google api with access token
        $this->_guzzle_client = new Client();

        //if valid token
        if ($this->is_access_token_valid($access_token)) {
            //request further user information
            $user_data = $this->get_user_info($access_token);
            //find the user with the email id
            $user = User::getUserByEmail($user_data['email']);
            //check if user is not empty
            if (!empty($user)) {
                //only then login
                Auth::login($user);
                //redirect to market home
                return Redirect::route('market-home');
            }
            //can create the user!
            else {

            }
        }
        //Something went wrong, logout if at all we logged user in
        Auth::logout();
        //Go to landing page
        return Redirect::route('root');
    }

    /**
     * Handle user logout and redirect to landing page
     *
     * Flush all user session data. Logout. Redirect.
     * @return mixed
     */
    public function action_logout()
    {
        //remove all session data, ironically not saving any session as of now! what a futuristic code, Ratta boy
        Session::flush();
        //logout the user
        Auth::logout();
        //Ghar pe ja
        return Redirect::route('root');
    }

    public function getDemo()
    {
        echo "<pre>";
        print_r(User::find(1)->address);
        echo "</pre>";
        exit;

    }

    /**
     * Validate the access token
     * @param $access_token
     * @return bool
     */
    private function is_access_token_valid($access_token)
    {
        $validate_url = $_ENV['OAUTH_VALIDURL']. $access_token;
        $response = $this->_guzzle_client->get($validate_url);
        return $response->getStatusCode() == 200;
    }

    /**
     * Get the user data from google using the access token
     * @param $access_token
     * @return mixed
     */
    private function get_user_info($access_token)
    {
        $user_info_url = $_ENV['OAUTH_USERINFO']. $access_token;
        $user_data_response = $this->_guzzle_client->get($user_info_url);
        $user_data = $user_data_response->getBody()->getContents();
        return json_decode($user_data, true);
    }


}
