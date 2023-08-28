<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterRetur extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'WName', 'MName', 'SCMName'];
    protected $casts = [
        'created_date' => 'datetime',
        'warehouse_date' => 'datetime',
        'marketing_date' => 'datetime',
        'scm_date' => 'datetime',
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
    public function SCMName(){
        return $this->belongsTo(User::class, 'scm_name', 'uid');
    }
}
