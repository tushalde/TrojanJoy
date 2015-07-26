<?php

namespace tj_core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

use tj_core\Http\Requests;
use tj_core\Models\Post;

class PostsController extends APIBaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($this->request->all(), static::getPostValidationRules());

        if ($validator->fails()) {
            return Response($this->getStructuredResponse(array(), $validator->errors()->all()));
        }
        Post::create($this->request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return ($this->getStructuredResponse(Post::find($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($this->request->all(), static::getPostValidationRules());

        if ($validator->fails()) {
            return Response($this->getStructuredResponse(array(), $validator->errors()->all()));
        }

        $updated_post = Post::find($id)->update($this->request->all());
        if ($updated_post) {
            $updated_post = Post::find($id);
        }
        return Response($this->getStructuredResponse($updated_post, 'success', array()));
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

    private static function getPostValidationRules()
    {
        return [
            'owner_id' => 'required|numeric',
            'title' => 'required|alpha',
            'description' => 'sometimes|aplha',
        ];
    }
}
