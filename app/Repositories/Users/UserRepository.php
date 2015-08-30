<?php

namespace studyhub\Repositories\Users;

use studyhub\Repositories\Contracts\RepositoryInterface;
use studyhub\Repositories\Eloquent\Repository;

class UserRepository extends Repository
{	
	/**
	 * Specify Model class name
	 * 
	 * @return mixed
	 */
	function model()
	{
		return 'studyhub\Entities\User';
	}

	public function tellSomething()
	{
		return 'UserRepository Tex overrides Repository Text';
	}
}