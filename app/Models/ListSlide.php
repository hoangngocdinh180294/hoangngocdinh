<?php

namespace App\Models;

class ListSlide extends MotbitModel
{   
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function slides()
    {
    	return $this->hasMany(Slide::class);
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
