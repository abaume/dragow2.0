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
                return \response()->json("already exist", 409);
            }
        }
    }

    public function uploadColor(Request $request) {
        $this->validate($request, [
            'img' => 'required|image|mimes:png|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $image = $request->file('input_img');
            $name = $request->input('color_name').'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/dragons/' . $request->input('race_name') . '/');
            $image->move($destinationPath, $name);
            $this->save();

            return back()->with('success','Image Upload successfully');
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
