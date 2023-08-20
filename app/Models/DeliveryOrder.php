<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    protected $with = ['user', 'SalesName', 'SalesName2', 'QcName', 'LogisticsName', 'SecurityName', 'CustomerName'];
   
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_uid', 'uid');
    }

    public function SalesName()
    {
        return $this->belongsTo(User::class, 'sales1_name', 'uid');
    }

    public function SalesName2()
    {
        return $this->belongsTo(User::class, 'sales2_name', 'uid');
    }

    public function QcName()
    {
        return $this->belongsTo(User::class, 'qc_name', 'uid');
    }

    public function LogisticsName()
    {
        return $this->belongsTo(User::class, 'logistics_name', 'uid');
    }

    public function SecurityName()
    {
        return $this->belongsTo(User::class, 'logistics_security_name', 'uid');
    }

    public function CustomerName()
    {
        return $this->belongsTo(User::class, 'logistics_customer_name', 'uid');
    }
}
