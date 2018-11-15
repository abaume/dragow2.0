<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppearanceResource;
use App\Models\Appearance;
use App\Models\Race;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    /**
     * Display a listing of the resource for one race of dragons.
     *
     * @param Race $race
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Race $race)
    {
        return AppearanceResource::collection(Appearance::query()->where('race', $race->id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $this->validate($request, [
            'input_img' => 'required|image|mimes:png|max:2048',
        ]);

        if ($request->hasFile('input_img')) {
            $image = $request->file('input_img');
            $name = $request->input('color_name').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/dragons/' . $request->input('race_name') . '/');
            $image->move($destinationPath, $name);
            $this->save();

            return back()->with('success','Image Upload successfully');
        }
    }
}