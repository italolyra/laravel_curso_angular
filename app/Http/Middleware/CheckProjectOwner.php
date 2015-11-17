<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Repositories\ProjectRepository;

class CheckProjectOwner
{
    private $repository;
	public function __construct(ProjectRepository $repository){

		$this->repository = $repository;
	}
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         // criei esse middleware para escutar
	    //verifica se usuario tem permissão
	    $userId = \Authorizer::getResourceOwnerId();
	    $projectId = $request->project;
	    if($this->repository->isOwner($request->project, $userId) == false)
	    {
		    return ['error'=>"Acesso negado!!!"];
	    }
        return $next($request);

    }
}
