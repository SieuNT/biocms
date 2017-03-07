<?php

namespace App\Contracts;

interface RepositoryInterface {
    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);

    public function all($columns = ['*']);

    public function create(array $attributes = []);

    public function update(array $attributes = [], array $options = []);

    public function destroy($ids);

    public function findOrFail($id);

    public function lists($column, $key = null);

    public function where($column, $operator = null, $value = null, $boolean = 'AND');
}