<?php

namespace tj_core\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class IsMindingOwnBusiness
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * This method checks if user is either logged in & also if user is manipulating own data
     * The $requestFieldToMatch is the field in the request to compare authenticated user id to request parameter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $requestFieldToMatch)
    {
        if ( !($request->$requestFieldToMatch == Auth::user()->id) ) {
            //TODO: Generate a log for this request
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('/');
            }
        }

        return $next($request);
    }


}
