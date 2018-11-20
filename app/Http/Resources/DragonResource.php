<?php
/**
 * Created by PhpStorm.
 * User: aurore
 * Date: 20/11/18
 * Time: 21:42
 */

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class DragonResource extends JsonResource
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
            'name' => $this->name,
            'gender' => $this->gender,
            'statistics' => $this->statistics,
            'breeding_uuid' => $this->breeding_uuid,
            'appearance_uuid' => $this->appearance_uuid
        ];
    }
}
