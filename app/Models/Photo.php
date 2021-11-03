<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['id', 'user_id', 'category_id','url', 'name'];
    public function users()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
