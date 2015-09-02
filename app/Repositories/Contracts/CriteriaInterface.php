<?php

namespace studyhub\Repositories\Contracts;

use studyhub\Repositories\Criteria\Criteria;

interface CriteriaInterface {

	public function skipCriteria($status = true);

	public function getCriteria();

	public function getByCriteria(Criteria $criteria);

	public function pushCriteria(Criteria $criteria);

	public function applyCriteria();
}