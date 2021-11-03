<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['id', 'name', 'instruction'];
    // public function getInstructionAttribute($value)
    // {
    //     return str_replace("|", "< br />",$value);
    // }
}
