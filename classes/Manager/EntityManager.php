<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 30/11/16
 * Time: 14:24
 */

namespace Aston\Manager;


use Aston\Entity\EntityInterface;

abstract class EntityManager implements EntityManagerInterface
{
    protected $bd;

    abstract public function addEntity(EntityInterface $entity);
    abstract public function getEntity($id);
    abstract public function getEntities(array $ids);
}