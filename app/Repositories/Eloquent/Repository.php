<?php

namespace studyhub\Repositories\Eloquent;

use studyhub\Repositories\Contracts\RepositoryInterface;
use studyhub\Repositories\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

/**
 * Class Repository
 *
 * @package studyhub\Repositories\Eloquent
 */
abstract class Repository implements RepositoryInterface
{
	/**
	 * Application
	 * @var App
	 */
	private $app;

	protected $model;

	public function __construct(App $app)
	{
		$this->app = $app;
		$this->makeModel();
	}

	/**
	 * Specify Model class name
	 * 
	 * @return mixed
	 */
	abstract function model();

	public function all($columns = array('*'))
	{
		return $this->model->get($columns);
	}

	public function paginate($perPage = 15, $columns = array('*'))
	{
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
		return $this->model->find($id, $columns);
	}

	public function findBy($attribute, $value, $columns = array('*'))
	{
		return $this->model->where($attribute, '=', $value)->first($columns);
	}

	public function tellSomething()
	{
		return 'Repository Text';
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Builder
	 * @throws RepositoryException
	 */
	public function makeModel()
	{
		$model = $this->app->make($this->model());

		if (! $model instanceof Model)
			throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");

		return $this->model = $model;
	}

}