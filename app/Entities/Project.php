<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [

        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'

    ];
    public function notes()
    {
        //tem varias notas
        return $this->hasMany(ProjectNote::class);
    }

	public function members(){
		//essa tabela pertence projeto_members a muitos users
		return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
	}
	public function files()
	{
		return $this->hasMany(ProjectFile::class);
	}

}
