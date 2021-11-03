<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    protected $fillable = ['id', 'user_id','name'];
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}