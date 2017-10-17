<?php

namespace Sysproject\Services;

use Sysproject\Repositories\ProjectRepository;
use Sysproject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
	/**
	 * @var ProjectRepository
	 */
	protected $repository;

	/**
	 * @var ProjectValidator
	 */
	protected $validator;

	function __construct(ProjectRepository $repository, ProjectValidator $validator)
	{
		$this->repository = $repository;
		$this->validator = $validator;
	}

	public function create(array $data)
	{
		try {
			$this->validator->with($data)->passesOrFail();

			return $this->repository->create($data);

		} catch(ValidatorException $e){
			return [
				'error' 	=>	true,
				'message'	=> $e->getMessageBag()
			];
		}
	}

	public function update(array $data, $id)
	{
		try {
			$this->validator->setId($id);
			$this->validator->with($data)->passesOrFail();

			return $this->repository->update($data,$id);

		} catch(ValidatorException $e){
			return [
				'error' 	=>	true,
				'message'	=> $e->getMessageBag()
			];
		}
	}

	public function addMember($project_id, $user_id)
	{
		$this->repository->find($project_id)->members()->attach($user_id);
		return ['message' => 'Member Add with Success!'];
	}

	public function removeMember($project_id, $user_id)
	{
		$this->repository->find($project_id)->members()->detach($user_id);
		return ['message' => 'Member Removed with Success!'];
	}

	public function isMember($project_id, $user_id)
	{
        if ($this->repository->find($project_id)->members()->find($user_id)){
            return ['message' => true];
        }else{
            return ['message' => false];
        }
	}
}
