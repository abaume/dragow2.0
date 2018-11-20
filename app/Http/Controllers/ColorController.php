<?php

namespace App\Http\Controllers;

use App\Http\Resources\ColorResource;
use App\Models\Color;
use App\Models\Dragon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ColorResource::collection(Color::all());
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
            'name'          => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $color = new Color;
            $color->name           = $request->input('name');

            $color->save();
            return \response()->json($color, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Color $color
     * @return \App\Color|Color
     */
    public function show(Color $color)
    {
        return $color;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Color $color
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Color $color)
    {
        $rules = array(
            'name'          => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $color->name           = $request->input('name');

            $color->save();
            return \response()->json($color, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Color $color
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Exception
     */
    public function destroy(Color $color)
    {
        if (!Dragon::query()->where('color_uuid', 'like', $color->id)->exists()) {
            $color->delete();
            return \response()->json(null, 204);
        } else {
            return 'this color is used by dragon';
        }
    }
}
