<?php

namespace App\Models;

class Price extends MotbitModel
{
   protected $table = "prices";
   protected $fillable = ['title','body','slug','image','price','meta_description','meta_keywords','excerpt'];
}
