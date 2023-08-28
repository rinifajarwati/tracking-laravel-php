<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'CoorLogistics', 'QcName', 'LogisticsName', 'CustomerName'];
    protected $casts = [
        'created_date' => 'datetime',
        'coor_logistics_date' => 'datetime',
        'qc_date' => 'datetime',
        'logistics_date' => 'datetime',
        'logistics_customer_date' => 'datetime',
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

    public function CoorLogistics()
    {
        return $this->belongsTo(User::class, 'coor_logistics_name', 'uid');
    }

    public function QcName()
    {
        return $this->belongsTo(User::class, 'qc_name', 'uid');
    }

    public function LogisticsName()
    {
        return $this->belongsTo(User::class, 'logistics_name', 'uid');
    }

    public function CustomerName()
    {
        return $this->belongsTo(User::class, 'logistics_customer_name', 'uid');
    }
}
