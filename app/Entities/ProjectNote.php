<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectNote extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [

	    'id',
        'project_id',
        'title' ,
        'note' ,

    ];


    public function project()
    {
        //pertence a projeto
        return $this->belongsTo(Project::class);
    }

}
