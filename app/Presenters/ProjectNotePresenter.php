<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 03/11/2015
 * Time: 14:21
 */

namespace CodeProject\Presenters;
use CodeProject\Transformers\ProjectNoteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;


class ProjectNotePresenter extends FractalPresenter
{
	public function getTransformer()
	{
		return new ProjectNoteTransformer();
	//	return new ProjectMemberTransformer();

	}

} 