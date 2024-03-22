<?php

namespace App\Repositories\Interface;
interface RepositoryInterface
{
    public function getModel();

    public function setModel(): void;

    public function paginate($perPage = 15);

    public function save($object);

    public function delete($id);

    public function find($id, $columns = ['*']);
}
