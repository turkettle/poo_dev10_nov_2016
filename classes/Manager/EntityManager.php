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
    
    public function addEntity(EntityInterface $entity)
    {
    }
    
    public function getEntity($id)
    {
    }
    
    public function getEntities(array $ids)
    {
    }
    
    public function deleteEntity($id)
    {
    }
}