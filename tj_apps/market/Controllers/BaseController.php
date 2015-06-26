<?php
namespace market\Controllers;

use tj_core\Http\Controllers\Controller;

class BaseController extends Controller
{

    public function home(){
        return View('market.base.home')->with('data', 'Welcome to Dev Status Laravel 5 package');
    }

    /**
     * Display developer status based on the number of Github Repos
     *
     * @return Response
     */
    public function index($username)
    {
//        $result = json_decode(file_get_contents($url, true, $context));
        $name = "Sunil";
        $public_repos = 40;
        $status = "";

        if($public_repos <= 10){
            $status = "Rookie";
        }
        if( $public_repos > 10 && $public_repos <= 25){
            $status = "Intermediate";
        }
        if( $public_repos > 25){
            $status = "Ninja";
        }

        $finalStatus = $name . " is a " . $status . " Open Source Evangelist";

        return response([
            'Developer Status' => $finalStatus
        ]);

    }

}