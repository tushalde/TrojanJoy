<?php
namespace market\Controllers;

use tj_core\Http\Controllers\Controller;

class SellController extends Controller
{

    public function sell_home(){
        return View('market.sell_home')->with('data', 'Welcome to Dev Status Laravel 5 package');
    }

}