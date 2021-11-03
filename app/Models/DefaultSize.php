<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultSize extends Model
{
    
    public $timestamps = false;
    protected $fillable = ['id', 'name', 'size'];
}
