<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soharga extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'SName', 'AName'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }

    public function SName()
    {
        return $this->belongsTo(User::class, 'sales_name', 'uid');
    }

    public function AName(){
        return $this->belongsTo(User::class, 'adminsales_name', 'uid');
    }
}
