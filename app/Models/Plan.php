<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['id','name', 'amount_required'];
    public function features(){
        return $this->hasMany(\App\Models\Feature::class);
    }
}
