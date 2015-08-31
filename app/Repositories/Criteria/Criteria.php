<?php

namespace studyhub\Repositories\Criteria;

use studyhub\Repositories\Contracts\RepositoryInterface as Repository;
use studyhub\Repositories\Contracts\RepositoryInterface;

abstract class Criteria
{
	/**
	 * This method holds criteria query which whill be applied
	 * in the Repository class on the concrete entity.
	 * 
	 * @param  [type]     $model      [description]
	 * @param  Repository $repository [description]
	 * @return [type]                 [description]
	 */
	public abstract function apply($model, Repository $repository);
}