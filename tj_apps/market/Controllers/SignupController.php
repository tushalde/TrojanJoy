<?php
namespace market\Controllers;

use tj_core\Http\Controllers\Controller;

class SignupController extends Controller
{

    public function signup(){
        return View('market.signup');
    }

}