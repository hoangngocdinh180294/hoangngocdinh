<?php

namespace App\Models;

class ProjectImage extends MotbitModel
{
    public function project()
    {
    	return $this->belongsTo(Project::class);
    }
}
