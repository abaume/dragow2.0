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
}