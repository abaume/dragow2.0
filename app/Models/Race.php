<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use Uuids;
    public $incrementing = false;

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attributes_uuid');
    }
}
