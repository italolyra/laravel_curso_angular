<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 03/11/2015
 * Time: 14:21
 */

namespace CodeProject\Presenters;
use CodeProject\Transformers\ProjectMemberTransformer;
use CodeProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{
	public function getTransformer()
	{
		return new ProjectTransformer();
	//	return new ProjectMemberTransformer();

	}

} 