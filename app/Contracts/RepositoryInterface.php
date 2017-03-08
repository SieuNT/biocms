<?php

namespace App\Contracts;

interface RepositoryInterface {
    public function paginate($perPage = 15, $columns = ['*'], $pageName = 'page', $page = null);

    public function find($id, $columns = []);

    public function create(array $data = []);

    public function update(array $data = [], $value, array $field = []);

    public function updateOrCreate(array $attribues, array $values = []);

    public function destroy($id);

    public function all($columns = ['*']);

    public function lists($column, $key = null);

    public function where($column, $operator = null, $value = null, $boolean = 'AND');
}