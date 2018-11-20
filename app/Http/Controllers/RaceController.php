<?php

namespace App\Http\Controllers;

use App\Http\Resources\RaceResource;
use App\Models\Dragon;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RaceResource::collection(Race::all());
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
            'feature'       => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $race = new Race;
            $race->name           = $request->input('name');
            $race->feature        = $request->input('feature');

            $race->save();
            return \response()->json($race, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Race $race
     * @return Race|\App\Race
     */
    public function show(Race $race)
    {
        return $race;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Race $race
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Race $race)
    {
        $rules = array(
            'name'          => 'required | string',
            'feature'       => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $race->name           = $request->input('name');
            $race->feature        = $request->input('feature');

            $race->save();
            return \response()->json($race, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Race $race
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Exception
     */
    public function destroy(Race $race)
    {
        if (!Dragon::query()->where('race_uuid', 'like', $race->id)->exists()) {
            $race->delete();
            return \response()->json(null, 204);
        } else {
            return 'this race is used by dragons';
        }
    }
}
