<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherFile extends Model
{
    
    protected $fillable = ['id', 'user_id', 'url', 'name', 'size'];
    public function users()
    {
        return $this->belongsTo(\App\App\Models\User::class);
    }
}
