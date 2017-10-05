<?php

namespace Sysproject\Services;

use Sysproject\Repositories\ProjectNoteRepository;
use Sysproject\Validators\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService
{
	/**
	 * @var ProjectNoteRepository
	 */
	protected $repository;

	/**
	 * @var ProjectNoteValidator
	 */
	protected $validator;

	function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator)
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
}
