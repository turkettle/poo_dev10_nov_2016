<?php

namespace Aston\Factory;

use Aston\Core\Database;

/**
 * Created by PhpStorm.
 * User: aston
 * Date: 29/11/16
 * Time: 14:47
 */
class EntityManagerFactory
{
    public static function get($entity_class)
    {
        $manager_class = 'Aston\Manager\\' . ucfirst($entity_class) . 'Manager';
    
        if (class_exists($manager_class)) {
            
            $db = Database::getConnection('PDO');
            $manager = new $manager_class($db);
            
            return $manager;
        }
        else {
            throw new \Exception("Mauvais type d'entité donnée à la Factory de Manager d'entité.");
        }
    }
}