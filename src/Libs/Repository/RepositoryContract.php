<?php

namespace Nin\Libs\Repository;

interface RepositoryContract
{
    /**
     * Retrieve all data of repository
     */
    public function all();

    /**
     * Save data of repository
     *
     * @param $entity
     * @return bool
     */
    public function save($entity);

}
