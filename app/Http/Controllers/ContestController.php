<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Contest[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Contest::all();
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
            'level'     => 'required',
            'main_stat' => 'required',
            'gain'      => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $contest = new Contest;
            $contest->level       = $request->input('level');
            $contest->main_stat   = $request->input('main_stat');
            $contest->gain        = $request->input('gain');

            $contest->save();
            return \response()->json($contest, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Contest $contest
     * @return \App\Contest|Contest
     */
    public function show(Contest $contest)
    {
        return $contest;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contest $contest
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Contest $contest)
    {
        $rules = array(
            'level'     => 'required',
            'main_stat' => 'required',
            'gain'      => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            $contest->level       = $request->input('level');
            $contest->main_stat   = $request->input('main_stat');
            $contest->gain        = $request->input('gain');

            $contest->save();
            return \response()->json($contest, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contest $contest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Contest $contest)
    {
        $contest->delete();
        return \response()->json(null, 204);
    }
}
