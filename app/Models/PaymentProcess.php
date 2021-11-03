<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProcess extends Model
{
    protected $fillable = ['id', 'user_id', 'method_id', 'plan_id','amount','transaction_code', 'phone', 'verified','country'];
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
