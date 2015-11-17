<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Services\ClientService;
use CodeProject\Validators\ClienteValidator;
use Illuminate\Http\Request;
use CodeProject\Repositories\ClientRepository;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var ClientService
     */

    private $service;

    /**
     * @param ClientRepository $repository
     * @param Request $request
     * @param ClientService $service
     */
    public function __construct(ClientRepository $repository, Request $request,ClientService $service)
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
	       // return
		       return $this->repository->all();

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
    public function show($id)
    {
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
        $this->repository->delete($id);
    }
}
