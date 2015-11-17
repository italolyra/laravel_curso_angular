<?php
/**
 * Created by PhpStorm.
 * User: Italo
 * Date: 29/10/2015
 * Time: 12:19
 */

namespace CodeProject\Services;
use CodeProject\Entities\Project;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;

class ProjectService
{

    protected $repository;
    protected $validator;
	protected $filesystem;
	protected  $storage;


    public function __construct(ProjectRepository $repository, ProjectValidator $validator,
       Filesystem $filesystem, Storage $storage)
    {
        $this->repository = $repository;
        $this->validator = $validator;
	    $this->filesystem = $filesystem;
	    $this->storage = $storage;

    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }
        catch(ValidatorException $e){
            return [
                'error'=> true,
                'message' => $e->getMessageBag()
            ];
        }
    }
    public  function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }
        catch(ValidatorException $e){
            return [
                'error'=> true,
                'message' => $e->getMessageBag()
            ];
        }




    }

	public function createFile(array $data)
	{
		//$projectId, $extension, $name, $description $file
		$project = $this->repository->skipPresenter()->find($data['project_id']);
		//dd($project);
		$projectFile = $project->files()->create($data);
		//dd($projectFile);
		$this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));
	}
}













































































































































































































































