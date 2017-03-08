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

    public function update(array $data = [], $value, array $field = ['id'])
    {
        return $this->model->where($field, '=', $value)->update($data);
    }

    public function updateOrCreate(array $attribues, array $values = [])
    {
        return $this->model->updateOrInsert($attribues, $values);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->where('id', '=', $id)->first($columns);
    }

    public function where($column, $operator = null, $value = null, $boolean = 'and')
    {
        return $this->model->where($column, $operator, $value, $boolean);
    }
}