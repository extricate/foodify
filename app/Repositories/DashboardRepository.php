<?php

namespace App\Repositories;

abstract class DashboardRepository implements RepositoryInterface {

    /**
     * Not implemented yet. But keeping it here to remind myself I _really_ need
     * to dive deeper into Repositories and subsequently, caching.
     *
     * @param array $columns
     * @return void
     */
    public function all($columns = array('*'))
    {
        // TODO: Implement all() method.
    }

    public function paginate($perPage = 10, $columns = array('*'))
    {
        // TODO: Implement paginate() method.
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id, $columns = array('*'))
    {
        // TODO: Implement find() method.
    }

    public function findBy($field, $value, $columns = array('*'))
    {
        // TODO: Implement findBy() method.
    }
}