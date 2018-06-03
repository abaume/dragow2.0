<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use Uuids;
    public $incrementing = false;
}
