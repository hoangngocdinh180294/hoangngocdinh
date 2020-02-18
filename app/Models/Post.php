<?php

namespace App\Models;
class Post extends MotbitModel
{
    use \Spatie\Tags\HasTags;
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'post_category');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopePost($query)
    {
        return $query->where('type', 'post');
    }
    protected $table="posts";
}
