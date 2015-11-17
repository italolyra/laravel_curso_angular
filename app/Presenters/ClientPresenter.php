<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 03/11/2015
 * Time: 14:21
 */

namespace CodeProject\Presenters;
use CodeProject\Transformers\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ClientPresenter extends FractalPresenter
{
	public function getTransformer()
	{
		return new ClientTransformer();
	//	return new ProjectMemberTransformer();

	}

} 