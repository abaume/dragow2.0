<?php

namespace App\Http\Controllers;

use App\Http\Resources\DragonResource;
use App\Models\Dragon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DragonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return DragonResource::collection(Dragon::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'name'          => 'required | string',
            'gender'        => 'required',
            'color_uuid'    => 'required',
            'race_uuid'     => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $dragon = new Dragon;
            $dragon->name           = $request->input('name');
            $dragon->gender         = $request->input('gender');
            $dragon->statistics     = $request->input('statistics');
            $dragon->breeding_uuid  = $request->input('breeding_uuid');
            $dragon->color_uuid     = $request->input('color_uuid');
            $dragon->race_uuid      = $request->input('race_uuid');

            $dragon->save();
            return \response()->json($dragon, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Dragon $dragon
     * @return Dragon
     */
    public function show(Dragon $dragon)
    {
        return $dragon;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Dragon $dragon
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Dragon $dragon)
    {
        $rules = array(
            'name'          => 'required | string',
            'gender'        => 'required',
            'statistics'    => 'required',
            'breeding_uuid' => 'required',
            'color_uuid'    => 'required',
            'race_uuid'     => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $dragon->name           = $request->input('name');
            $dragon->gender         = $request->input('gender');
            $dragon->statistics     = $request->input('statistics');
            $dragon->breeding_uuid  = $request->input('breeding_uuid');
            $dragon->color_uuid     = $request->input('color_uuid');
            $dragon->race_uuid      = $request->input('race_uuid');

            $dragon->save();
            return \response()->json($dragon, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Dragon $dragon
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Dragon $dragon)
    {
        /*Participation::query()->where('dragon_uuid', 'like', $dragon->id)->update(['dragon_uuid' => null]);
        $dragon->delete();
        return \response()->json(null, 204);*/
    }
}
