<?php

namespace Aston\Entity;

use Aston\Entity\EntityInterface;
use Aston\Manager\AuthorEntityManager;
use Aston\Factory\EntityFactory;

/**
 * Class AuthorEntity
 */
class AuthorEntity implements EntityInterface
{
    private $id;
    private $name;
    private $body;
    
    protected $manager;
    
    public function __construct(AuthorEntityManager $manager)
    {
        $this->manager = $manager;
    }
    
    public function save()
    {
        $this->manager->addEntity($this);
    }
    
    public static function load($id)
    {
    //     if (is_numeric($id)) {
    //
    //         $manager = EntityManagerFactory::get('BookEntity');
    //         $data = $manager->getEntity($id);
    //         if (!$data) {
    //             return false;
    //         }
    //         $entity = BookEntity::create($data);
    //         return $entity;
    //
    //     } elseif (is_array($id)) {
    //         // $this = $this->manager->getBooks($id);
    //     } else {
    //         throw new Exception('Mauvais format de donnée pour la méthode load().');
    //     }
    }
    
    public function delete()
    {
        // $this->manager->deleteEntity($this->getId());
        // // TODO : Message flash
    }
    
    public static function create(array $data)
    {
        if (isset($data['name']) && $data['name']) {
            $author = EntityFactory::get('AuthorEntity');
            $author->hydrate($data);
            return $author;
        } else {
            throw new \Exception('Missing key "title" for Class AuthorEntity.');
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
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $id = (int)$id;
        if ($id > 0) {
            $this->id = $id;
        }
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $title = htmlentities($name);
        if (strlen($title) <= 50) {
            $this->name = $name;
        } else {
            throw new Exception('Le titre ne peut pas dépasser 50 caractères.');
        }
    }
    
    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
    
    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }
    
    
}