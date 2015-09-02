<?php

namespace studyhub\Repositories\Eloquent;

use studyhub\Repositories\Contracts\RepositoryInterface;
use studyhub\Repositories\Exceptions\RepositoryException;
use studyhub\Repositories\Contracts\CriteriaInterface;
use studyhub\Repositories\Criteria\Criteria;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Container\Container as App;

/**
 * Class Repository
 *
 * @package studyhub\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface, CriteriaInterface
{
	/**
	 * Application
	 * @var App
	 */
	private $app;

	protected $model;

	/**
	 * @var Collection
	 */
	protected $criteria;

	/**
	 * @var boolean
	 */
	protected $skipCriteria = false;

	public function __construct(App $app, Collection $collection)
	{
		$this->app = $app;
		$this->criteria = $collection;
		$this->resetScope();
		$this->makeModel();
	}

	/**
	 * Specify Model class name
	 * 
	 * @return mixed
	 */
	abstract function model();

	/**
	 * Get all records of model instance
	 * 
	 * @param  array  $columns [description]
	 * @return [type]          [description]
	 */
	public function all($columns = array('*'))
	{
		$this->applyCriteria();
		return $this->model->get($columns);
	}

	public function paginate($perPage = 15, $columns = array('*'))
	{
		$this->applyCriteria();
		return $this->model->paginate($perPage, $columns);
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update(array $data, $id, $attribute="id")
	{
		return $this->model->where($attribute, '=', $id)->update($data);
	}

	public function delete($id)
	{
		return $this->model->destroy($id);
	}

	public function find($id, $columns = array('*'))
	{
		$this->applyCriteria();
		return $this->model->find($id, $columns);
	}

	public function findBy($attribute, $value, $columns = array('*'))
	{
		$this->applyCriteria();
		return $this->model->where($attribute, '=', $value)->first($columns);
	}

	// public function tellSomething()
	// {
	// 	return 'Repository Text';
	// }

	/**
	 * @return \Illuminate\Database\Eloquent\Builder
	 * @throws RepositoryException
	 */
	public function makeModel()
	{
		$model = $this->app->make($this->model());

		if (! $model instanceof Model)
			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

		return $this->model = $model->newQuery();
	}

	public function resetScope()
	{
		$this->skipCriteria(false);
		return $this;
	}

	public function skipCriteria($status = true)
	{
		$this->skipCriteria = $status;
	}

	public function getCriteria()
	{
		return $this->criteria;
	}
	
	public function getByCriteria(Criteria $criteria)
	{
		$this->model = $criteria->apply($this->model, $this);
		return $this;
	}

	public function pushCriteria(Criteria $criteria)
	{
		$this->criteria->push($criteria);
		return $this;
	}

	public function applyCriteria()
	{
		if ($this->skipCriteria === true)
			return $this;

		foreach ($this->getCriteria() as $criteria) {
			if ($criteria instanceof Criteria)
				$this->model = $criteria->apply($this->model, $this);
		}

		return $this;
	}

}