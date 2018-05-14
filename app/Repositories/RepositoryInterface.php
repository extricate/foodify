<?php

namespace App\Repositories;

interface RepositoryInterface {

    /**
     * Program to an interface, not an implementation (:
     * So that's what we're supposed to be doing here.
     *
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'));

    public function paginate($perPage = 10, $columns = array('*'));

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}