<?php

namespace Sysproject\Services;

use Sysproject\Repositories\ClientRepository;
use Sysproject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService
{
	/**
	 * @var ClientRepository
	 */
	protected $repository;

	/**
	 * @var ClientValidator
	 */
	protected $validator;

	function __construct(ClientRepository $repository, ClientValidator $validator)
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
		//enviar email
		//disparar notificação
		//postar um tweet

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
