<?php

namespace App\Contracts;

interface RepositoryInterface {
    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);

    public function all($columns = ['*']);

    public function create(array $data = []);

    public function update(array $data = [], $id, array $attributes = []);

    public function destroy($ids);

    public function findOrFail($id);

    public function lists($column, $key = null);

    public function where($column, $operator = null, $value = null, $boolean = 'AND');
}