<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AppearanceResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'color' => new ColorResource($this->color()->first()),
            'race' => new RaceResource($this->race()->first())
        ];
    }
}
