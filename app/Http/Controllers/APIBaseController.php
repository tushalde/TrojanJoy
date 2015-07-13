<?php
/**
 * Created by PhpStorm.
 * User: nishantjani
 * Date: 7/8/15
 * Time: 11:08 PM
 */

namespace tj_core\Http\Controllers;
use Illuminate\Support\Facades\Response;

class APIBaseController extends Controller
{
    protected function getStructuredResponse($payload, $status = 'success', $meta = array())
    {
        $response = array();
        if ( $status != 'success' ) {
            $response['error'] = $status;
            $response['status'] = 'error';
        } else {
            $response['status'] = 'success';
        }

        $response['data'] = $payload;
        //future hook, will add pagination, search queries, etc into this.
        $response['meta'] = array();

        return Response::json($response);
    }
}