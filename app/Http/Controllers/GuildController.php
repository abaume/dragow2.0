<?php

namespace App\Http\Controllers;

use App\Http\Resources\GuildResource;
use App\Models\Guild;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        return GuildResource::collection(Guild::all());
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
            'name'       => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $guild = new Guild;
            $guild->name        = $request->input('name');

            $guild->save();
            return \response()->json($guild, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Guild $guild
     * @return \App\Alliance|Guild
     */
    public function show(Guild $guild)
    {
        return $guild;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Guild $guild
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Guild $guild)
    {
        $rules = array(
            'name'       => 'required | string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $guild->name        = $request->input('name');

            $guild->save();
            return \response()->json($guild, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Guild $guild
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Guild $guild)
    {
        User::query()->where('guild_uuid', 'like', $guild->id)->update(['guild_uuid' => null]);
        $guild->delete();
        return \response()->json(null, 204);
    }
}
