<?php

namespace Aston\Manager;

use Aston\Entity\BookEntity;
use Aston\Entity\EntityInterface;

/**
 * Class BookEntityManager.
 */
class BookEntityManager extends EntityManager
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function addEntity(EntityInterface $entity)
    {
    }

    public function getEntity($id)
    {
    }

    public function getEntities(array $ids)
    {
    }

    public function getLastEntities($limit, $offset)
    {
    }
}