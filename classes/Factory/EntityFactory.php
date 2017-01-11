<?php

namespace Aston\Factory;

/**
 * Created by PhpStorm.
 * User: aston
 * Date: 29/11/16
 * Time: 14:47
 */
class EntityFactory
{
    public static function get($entity_class)
    {
        $namespaced_class = 'Aston\Entity\\' . ucfirst($entity_class);
    
        if (class_exists($namespaced_class)) {
            
            $manager = EntityManagerFactory::get($entity_class);
            $entity = new $namespaced_class($manager);
            
            return $entity;
        }
        else {
            throw new \Exception("Mauvais type d'entité donnée à la Factory d'entité.");
        }
    }
}