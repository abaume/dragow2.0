<?php

namespace App\Http\Controllers;

use App\Http\Resources\AppearanceResource;
use App\Models\Appearance;
use App\Models\Color;
use App\Models\Race;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppearanceController extends Controller
{
    /**
     * Display a listing of the appearances.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        return AppearanceResource::collection(Appearance::all());
    }

    /**
     * Display a listing of the resource for one race of dragons.
     *
     * @param Race $race
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function indexByRace(Race $race)
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
        $rules = array(
            'race' => 'required',
            'color' => 'required|string'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            abort(400, 'wrong_parameter');
        } else {
            if ($this->appearanceNotExist($request)) {
                $appearance = new Appearance();
                if (!Color::query()->where('name', $request->input('color'))->exists()) {
                    $color = $this->createColor($request->input('color'));
                } else {
                    $color = Color::query()->where('name', $request->input('color'))->first();
                }

                $appearance->color = $color->id;
                $appearance->race = $request->input('race');
                $appearance->save();
                return \response()->json($appearance, 201);
            } else {
                return \response()->json("already exist", 201);
            }
        }
    }

    public function uploadColor(Request $request) {
        $this->validate($request, [
            'image' => 'required|image|max:2048',
            'race'  => 'required',
            'name' => 'required'
        ]);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $name = $request->input('name') . '.png';

            $race = Race::query()->where('id', $request->input('race'))->first()->name;

            $destinationPath = public_path('/storage/assets/dragons/' . $race . '/');
            $image->move($destinationPath, $name);

            return response()->json('Image Upload successfully', 201);
        }
    }

    /**
     * @param string $requestColor
     * @return Color
     */
    private function createColor(string $requestColor): Color
    {
        $color = new Color();
        $color->name = $requestColor;
        $color->save();
        return $color;
    }

    /**
     * @param Request $request
     * @return bool
     */
    private function appearanceNotExist(Request $request): bool
    {
        if (Color::query()->where('name', $request->input('color'))->exists()) {
            return !Appearance::query()
                ->where([
                    ['color', Color::query()->where('name', $request->input('color'))->first()->id],
                    ['race', $request->input("race")]])
                ->exists();
        } else return true;
    }
}
