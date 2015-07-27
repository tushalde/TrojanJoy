<?php

namespace tj_core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

use tj_core\Http\Requests;
use tj_core\Models\Item;

class ItemsController extends Controller
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
        Item::create($this->request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return ($this->getStructuredResponse(Item::find($id)));
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

        $updated_item = Item::find($id)->update($this->request->all());
        if ($updated_item) {
            $updated_item = Item::find($id);
        }
        return Response($this->getStructuredResponse($updated_item, 'success', array()));
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
            'post_id' => 'required|numeric',
            'title' => 'required|alpha_num',
            'description' => 'sometimes|aplha_num',
            'price' => 'required|alpha_num',
            'status_id' => 'required|numberic',
            'pickup_location' => 'required|numberic',
            'category_id' => 'required|numberic',
        ];
    }
}
