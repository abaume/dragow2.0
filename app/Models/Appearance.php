<?php

namespace App\Models;

use App\Uuids;
use Illuminate\Database\Eloquent\Model;

class Appearance extends Model
{
    use Uuids;
    public $incrementing = false;
}
