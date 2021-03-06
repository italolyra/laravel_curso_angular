<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;
use CodeProject\Repositories\ProjectRepository;



class ProjectFileController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ProjectService
     */

    private $service;



    public function __construct(ProjectRepository $repository, Request $request, ProjectService $service)
    {
        $this->repository = $repository;
        $this->request = $request;
        $this->service = $service;

    }

    /**
     * @return mixed
     */
    public function index()
    {

        return $this->repository->findWhere(['owner_id'=> \Authorizer::getResourceOwnerId()]);
    }


    /**
     * @return mixed
     */
    public function store()
    {
	    $file = $this->request->file('file');
	    $extension = $file->getClientOriginalExtension();

	    $data['file'] = $file;
	    $data['extension'] = $extension;
	    $data['name'] = $this->request->name;
	    $data['project_id'] = $this->request->project_id;
	    $data['description'] = $this->request->description;
	    $this->service->createFile($data);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
	    if($this->checkProjectPermissions($id) == false){
		    return ['error'=>'Você não tem permissão para acesso ao projeto'];
	    }
	    return $this->repository->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
	    if($this->checkProjectOwner($id) == false){
		    return ['error'=>'Você não tem permissão para acesso ao projeto'];
	    }
       return $this->service->update($this->request->all(), $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    if($this->checkProjectOwner($id) == false){
		    return ['error'=>'Você não tem permissão para acesso ao projeto'];
	    }
        $this->repository->delete($id);
    }

	private function checkProjectOwner($projectId){

		$userId = \Authorizer::getResourceOwnerId();

		return $this->repository->isOwner($projectId, $userId);

}
	private function checkProjectMembers($projectId){

		$userId = \Authorizer::getResourceOwnerId();

		return $this->repository->hasMember($projectId, $userId);

	}
	private function checkProjectPermissions($projectId)
	{
		if($this->checkProjectOwner($projectId) or $this->checkProjectMembers($projectId))
		{
			return true;
		}
		    return false;
	}
}
