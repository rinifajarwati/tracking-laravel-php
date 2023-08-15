<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['permission'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'id';
    }
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
