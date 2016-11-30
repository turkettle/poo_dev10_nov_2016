<?php

namespace Aston\Factory;

use Aston\Core\Database;

/**
 * Created by PhpStorm.
 * User: aston
 * Date: 29/11/16
 * Time: 14:47
 */
class EntityFactory
{
    public static function get($entity_type)
    {
        $manager_class = 'Aston\Manager\\' . ucfirst($entity_type) . 'EntityManager';
        $entity_class = 'Aston\Entity\\' . ucfirst($entity_type) . 'Entity';
        $db = Database::getConnection('PDO');

        if (class_exists($entity_class)) {
            $manager = new $manager_class($db);
            $entity = new $entity_class($manager);
            return $entity;
        }
        else {
            throw new \Exception("Mauvais type d'entité donnée à la Factory d'entité.");
        }
    }
}