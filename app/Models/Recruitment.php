<?php

namespace App\Models;

class Recruitment extends MotbitModel
{
   protected $table = "recruitment";
   protected $fillable = ['position','salary','slug','image','qty','meta_description','meta_keywords','exp','benefit','requried','descript'];
}
