<?php

namespace studyhub\Repositories\Criteria\Users;

use studyhub\Repositories\Criteria\Criteria;
use studyhub\Repositories\Contracts\RepositoryInterface as Repository;

class ActivatedViaEmail extends Criteria
{
	/**
	 * [apply description]
	 * @param  [type]     $model      [description]
	 * @param  Repository $repository [description]
	 * @return [type]                 [description]
	 */
	public function apply($model, Repository $repository)
	{
		$query = $model->where('activation_token', null);
		return $query;
	}
}