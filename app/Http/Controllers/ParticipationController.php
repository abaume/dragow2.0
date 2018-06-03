<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Participation[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Participation::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $rules = array(
            'dragon_uuid' => 'required',
            'contest_uuid' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $participation = new Participation;
            $participation->dragon_uuid = $request->input('dragon_uuid');
            $participation->contest_uuid = $request->input('contest_uuid');

            $participation->save();
            return \response()->json($participation, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Participation $participation
     * @return Participation|\App\Participation
     */
    public function show(Participation $participation)
    {
        return $participation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Participation $participation
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Participation $participation)
    {
        $rules = array(
            'dragon_uuid' => 'required',
            'contest_uuid' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $participation->dragon_uuid = $request->input('dragon_uuid');
            $participation->contest_uuid = $request->input('contest_uuid');

            $participation->save();
            return \response()->json($participation, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Participation $participation
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Participation $participation)
    {
        $participation->delete();
        return \response()->json(null, 204);
    }
}
