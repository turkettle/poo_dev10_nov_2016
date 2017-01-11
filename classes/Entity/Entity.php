<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 11/01/17
 * Time: 14:58
 */

namespace Aston\Entity;

use Aston\Factory\EntityFactory;
use Aston\Factory\EntityManagerFactory;
use Aston\Manager\EntityManagerInterface;


abstract class Entity implements EntityInterface
{
    
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }
    
    public function save()
    {
        $this->manager->addEntity($this);
    }
    
    public static function load($id)
    {
        if (is_numeric($id)) {
        
            $class = get_called_class();
            $manager = EntityManagerFactory::get($class);
            $data = $manager->getEntity($id);
            if (!$data) {
                return false;
            }
            $entity = $class::create($data);
    
            return $entity;
        
        } elseif (is_array($id)) {
            // $this = $this->manager->getBooks($id);
        } else {
            throw new Exception('Mauvais format de donée pour la méthode load().');
        }
    }
    
    public function delete()
    {
    //     $this->manager->deleteEntity($this->getId());
    //     // TODO : Message flash
    }
    
    public static function create(array $data)
    {
        if (isset($data['title']) && $data['title']) {
            $class = get_called_class();
            $book = EntityFactory::get($class);
            $book->hydrate($data);
            return $book;
        } else {
            throw new \Exception('Missing key "title" for Class BookEntity.');
        }
    }
    
    /**
     * Méthode d'hydratation.
     * @param array $data
     */
    public function hydrate(array $data) {
    
        foreach ($data as $property => $value) {
    
            $setter = 'set' . ucfirst($property);
            if (method_exists($this, $setter)) {
                $this->$setter($value);
            }
        }
    }
    
}