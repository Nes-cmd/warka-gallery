<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['id', 'name', 'descreption'];
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}
