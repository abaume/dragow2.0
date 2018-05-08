<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Dragon extends Model
{
    use Uuids;
    public $incrementing = false;
}
