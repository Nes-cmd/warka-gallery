<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['id', 'user_id', 'process_id', 'amount', 'plan_id', 'payed_at', 'next_payment_at'];
}
