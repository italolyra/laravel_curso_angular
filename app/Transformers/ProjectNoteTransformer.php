<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 03/11/2015
 * Time: 14:03
 */

namespace CodeProject\Transformers;
use CodeProject\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

class ProjectNoteTransformer extends TransformerAbstract
{
	public function transform(ProjectNote $notes)
	{
           return [

	           'id'=> $notes->id,
               'project_id'=> $notes->project_id,
	           'note'=> $notes->note,
	           'title'=> $notes->title,


           ];
	}

} 