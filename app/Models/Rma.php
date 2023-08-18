<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rma extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    
    protected $with = ['user', 'SName', 'TName', 'QName'];

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

    public function TName(){
        return $this->belongsTo(User::class, 'technician_name', 'uid');
    }

    public function QName(){
        return $this->belongsTo(User::class, 'qc_name', 'uid');
    }
}
