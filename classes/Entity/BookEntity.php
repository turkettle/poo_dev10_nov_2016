<?php

namespace Aston\Entity;

use Aston\Manager\BookEntityManager;
use Aston\Factory\EntityFactory;

/**
 * Class BookEntity
 */
class BookEntity extends Entity
{
    private $id;
    private $title;
    private $author;
    private $body;
    private $genre;
    
    protected $manager;
    
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