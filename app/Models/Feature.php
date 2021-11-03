<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    
    protected $fillable = ['id', 'name', 'plan_id'];
    public function plans()
    {
        return $this->belongsTo(\App\Models\Plan::class, 'feature_id');
    }
}
