<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRetur extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'WName', 'MName', 'MPName'];
    protected $casts = [
        'created_date' => 'datetime',
        'warehouse_date' => 'datetime',
        'marketing_date' => 'datetime',
        'ppic_marketing_date' => 'datetime',
    ];
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }
    
    public function WName(){
        return $this->belongsTo(User::class, 'warehouse_name', 'uid');
    }

    public function MName(){
        return $this->belongsTo(User::class, 'marketing_name', 'uid');
    }
    public function MPName(){
        return $this->belongsTo(User::class, 'ppic_marketing_name', 'uid');
    }
}
