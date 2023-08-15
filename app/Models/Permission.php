<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'id';
    }
}
