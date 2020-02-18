<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class custommer extends Model
{
    protected $table='custommers';
    protected $fillable = ['title','slug','body','meta_description','meta_keyword','image','status'];
}
