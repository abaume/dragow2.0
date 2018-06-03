<?php

namespace App\Http\Controllers;

use App\Models\Dragon;
use App\Models\Totem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TotemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Totem[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Totem::all();
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
            $totem = new Totem;
            $totem->name           = $request->input('name');

            $totem->save();
            return \response()->json($totem, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Totem $totem
     * @return Totem
     */
    public function show(Totem $totem)
    {
        return $totem;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Totem $totem
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Totem $totem)
    {
        $rules = array(
            'name'          => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $totem->name           = $request->input('name');

            $totem->save();
            return \response()->json($totem, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Totem $totem
     * @return \Illuminate\Http\JsonResponse|string
     * @throws \Exception
     */
    public function destroy(Totem $totem)
    {
        if (!User::query()->where('totem_uuid', 'like', $totem->id)->exists()) {
            $totem->delete();
            return \response()->json(null, 204);
        } else {
            return 'this totem is used by users';
        }
    }
}
