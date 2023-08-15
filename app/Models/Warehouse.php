<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }
}
