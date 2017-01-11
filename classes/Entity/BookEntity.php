<?php

namespace Aston\Entity;

use Aston\Entity\EntityInterface;
use Aston\Manager\BookEntityManager;
use Aston\Factory\EntityFactory;

/**
 * Class BookEntity
 */
class BookEntity implements EntityInterface
{
    private $id;
    private $title;
    private $author;
    private $body;
    private $genre;
    
    protected $manager;
    
    public function __construct(BookEntityManager $manager)
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
    
            $manager = EntityManagerFactory::get('BookEntity');
            $data = $manager->getEntity($id);
            if (!$data) {
                return false;
            }
            $entity = BookEntity::create($data);
            return $entity;
            
        } elseif (is_array($id)) {
            // $this = $this->manager->getBooks($id);
        } else {
            throw new Exception('Mauvais format de donée pour la méthode load().');
        }
    }
    
    public function delete()
    {
        $this->manager->deleteEntity($this->getId());
        // TODO : Message flash
    }
    
    public static function create(array $data)
    {
        if (isset($data['title']) && $data['title']) {
            $book = EntityFactory::get('BookEntity');
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
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $title = htmlentities($title);
        if (strlen($title) <= 50) {
            $this->title = $title;
        } else {
            throw new Exception('Le titre ne peut pas dépasser 50 caractères.');
        }
    }
    
    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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
    
    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }
    
    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
    
}