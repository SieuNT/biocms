<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Container\Container;

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

        return $this->model = $model;
    }

    public function lists($column, $key = null)
    {
        // TODO: Implement lists() method.
    }

    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null)
    {
        // TODO: Implement paginate() method.
    }

    public function all($columns = ['*'])
    {
        // TODO: Implement all() method.
    }

    public function create(array $attributes = [])
    {
        // TODO: Implement create() method.
    }

    public function update(array $attributes = [], array $options = [])
    {
        // TODO: Implement update() method.
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