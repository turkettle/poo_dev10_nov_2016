<?php

namespace Aston\Entity;

use Aston\Manager\AuthorEntityManager;
use Aston\Factory\EntityFactory;

/**
 * Class AuthorEntity
 */
class AuthorEntity extends Entity
{
    private $id;
    private $title;
    private $body;
    
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
    
    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * @param mixed $title
     */
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