<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRetur extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'SName', 'WName', 'MName', 'MPName'];
    
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }

    public function SName(){
        return $this->belongsTo(User::class, 'sales_name', 'uid');
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
