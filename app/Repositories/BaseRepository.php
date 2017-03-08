<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface {

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model
     */
    protected $model;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    abstract public function model();

    public function makeModel() {
        $model = $this->app->make($this->model());
        if(!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        return $this->model = $model;
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function lists($column, $key = null)
    {
        return $this->model->pluck($column, $key);
    }

    public function create(array $data = [])
    {
        return $this->model->create($data);
    }

    public function update(array $data = [], $id, array $attributes = [])
    {
        return $this->model->where($attributes, '=', $id)->update($data);
    }

    public function destroy($ids)
    {
        // TODO: Implement destroy() method.
    }

    public function findOrFail($id)
    {
        // TODO: Implement findOrFail() method.
    }

    public function where($column, $operator = null, $value = null, $boolean = 'AND')
    {
        // TODO: Implement where() method.
    }
}