<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;
use CodeProject\Repositories\ProjectNoteRepository;

class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ProjectNoteService
     */

    private $service;

    /**
     * @param ProjectNoteRepository $repository
     * @param Request $request
     * @param ProjectNoteService $service
     */
    public function __construct(ProjectNoteRepository $repository, Request $request,ProjectNoteService $service)
    {
        $this->repository = $repository;
        $this->request = $request;
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }


    /**
     * @return mixed
     */
    public function store()
    {
        return $this->service->create($this->request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id, $noteId)
    {
       return $this->repository->findWhere(['project_id'=>$id,'id'=>$noteId]);
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
       return $this->service->update($this->request->all(),  $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $noteId)
    {
        $this->repository->delete($noteId);
    }
}
