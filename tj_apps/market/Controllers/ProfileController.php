<?php
namespace market\Controllers;

use tj_core\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function profile_view(){
        return View('market.profile_view');
    }

}