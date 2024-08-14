<?php

namespace App\Repositories\Interface;
interface RepositoryInterface
{
    public function getModel(): string;

    public function setModel(): void;

    public function paginate($perPage = 15);

    public function save($object);

    public function delete($id);

    public function find($id, $columns = ['*']);

    public function filters($filters, $columns = ['*'], $relations = []);
}
