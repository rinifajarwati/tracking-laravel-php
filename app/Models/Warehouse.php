<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'PName', 'WName', 'LName'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }

    public function PName(){
        return $this->belongsTo(User::class, 'ppic_name', 'uid');
    }

    public function WName(){
        return $this->belongsTo(User::class, 'warehouse_name', 'uid');
    }

    public function LName(){
        return $this->belongsTo(User::class, 'logistics_name', 'uid');
    }
}
