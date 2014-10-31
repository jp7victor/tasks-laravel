<?php namespace Acme\Services;

use Acme\Validators\TaskValidator;

use Acme\Validators\ValidationException;

use Task;


class TaskCreatorService {

	protected $validator;

	public function __construct(TaskValidator $validator)

	{


		this->validator = $validator;


	}

	public function make(array $attributes)

	{
		//determine whether data is valid
		if ($this->validator->isValid($attributes))
		{
			//create the new task
			Task::create([
				'title' => $input['title'],
				'body' => $input['body'],
				'user_id' => $input['assign']

			]);

			return true;

		}

		throw new ValidationException('Task validation failed', $this->validator->getErrors());
		

	}


}