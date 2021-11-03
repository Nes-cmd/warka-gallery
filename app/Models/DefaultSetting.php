<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultSetting extends Model
{
    protected $fillable = ['id','user_id','table_name', 'table_id']; 
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }
}
