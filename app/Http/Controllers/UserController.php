<?php

namespace tj_core\Http\Controllers;

use Illuminate\Support\Facades\Response;
use tj_core\Http\Requests;
use tj_core\Models\User;

class UserController extends APIBaseController
{
    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('isMindingOwnBusiness:id', ['only' => ['create','update','destroy']]);

//        $this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return ($this->getStructuredResponse(User::all()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     * @Middleware("userAuth")
     */
    public function show($id)
    {
        return ($this->getStructuredResponse(User::find($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
