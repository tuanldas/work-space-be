<?php

namespace App\Repositories;

use App\Repositories\Interface\RepositoryInterface;

abstract class EloquentRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel(): string;

    public function setModel(): void
    {
        $this->model = app()->make($this->getModel());
    }

    public function paginate($perPage = 15)
    {
        return $this->model->paginate($perPage);
    }

    public function save($object)
    {
        $object->save();
        return $object;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->select($columns)->find($id);
    }

    public function findByUUID($uuid, $columns = ['*'], $relations = [])
    {
        $query = $this->model->select($columns);
        if (!empty($relations)) {
            $query = $query->with($relations);
        }
        return $query->where('uuid', $uuid)->first();
    }
}
