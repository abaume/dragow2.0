<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    use Uuids;
    public $incrementing = false;

    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'color');
    }

    public function race()
    {
        return $this->belongsTo('App\Models\Race', 'race');
    }
}
