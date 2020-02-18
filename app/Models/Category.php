<?php

namespace App\Models;

class Category extends MotbitModel
{
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }
    protected $table='categories';
}
