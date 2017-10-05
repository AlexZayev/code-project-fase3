<?php

namespace Sysproject\Validators;

use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
	protected $rules = [
		'name' 					=>	'required|max:255',
		'responsible'		=> 	'required|max:255',
		'email'					=>	'required|email|unique:clients',
		'phone'					=> 	'required',
		'address'				=>	'required'
	];
}
