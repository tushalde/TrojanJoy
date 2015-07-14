<?php

namespace tj_core\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'sometimes|numeric',
        ]);

        if ($validator->fails()) {
            return Response($this->getStructuredResponse(array(), $validator->errors()->all()));
        }

        $user = new User($request->all());
        $saved_user = $user->save();
        return Response($this->getStructuredResponse($saved_user, 'success', array()));
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
