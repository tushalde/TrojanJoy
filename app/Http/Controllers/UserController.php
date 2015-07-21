<?php

namespace tj_core\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Response;
use tj_core\Http\Requests;
use tj_core\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends APIBaseController
{
    /**
     * Constructor for user controller
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(\Illuminate\Http\Request $request)
    {
        parent::__construct($request);
        $this->middleware('auth');
        $this->middleware('isMindingOwnBusiness:id', ['except' => ['show']]);
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
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validator = Validator::make($this->request->all(), static::getUserValidationRules());

        if ($validator->fails()) {
            return Response($this->getStructuredResponse(array(), $validator->errors()->all()));
        }

        $updated_user = User::find($id)->update($this->request->all());
        if ($updated_user) {
            $updated_user = User::find($id);
        }
        return Response($this->getStructuredResponse($updated_user, 'success', array()));
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

    private static function getUserValidationRules()
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'sometimes|numeric',
        ];
    }
}
