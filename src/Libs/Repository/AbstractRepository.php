<?php

namespace Nin\Libs\Repository;

use Nin\Libs\Container\ApplicationContract;
use Nin\Libs\ORM\ORMManagerContract;

abstract class AbstractRepository implements RepositoryContract
{
    protected ApplicationContract $app;
    protected $entityManager;

    public function __construct(ApplicationContract $app)
    {
        $this->app = $app;
        $this->entityManager = $this->getEntityManager($app->make(ORMManagerContract::class));
    }

    abstract public function entity();

    protected function getEntityManager(ORMManagerContract $orm)
    {
        return $orm->getEntityManager();
    }

    public function getEntityInstance()
    {
        $entity = $this->entity();
        return new $entity;
    }

    public function getRepository()
    {
        return $this->entityManager
            ->getRepository($this->entity());
    }

    public function all()
    {
        $repository = $this->getRepository();
        return $repository->findAll();
    }

    public function save($entity): bool
    {
        try {
            $entityManager = $this->entityManager;
            $entityManager->persist($entity);
            $entityManager->flush();
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
