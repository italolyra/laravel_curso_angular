<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 03/11/2015
 * Time: 14:03
 */

namespace CodeProject\Transformers;
use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract
{
	public function transform(User $members)
	{
           return [

	           'id'=> $members->id,
               'name'=> $members->name,
               'email'=> $members->email,

           ];
	}

} 