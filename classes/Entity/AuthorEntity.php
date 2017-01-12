<?php

namespace Aston\Entity;

use Aston\Manager\AuthorEntityManager;
use Aston\Factory\EntityFactory;

/**
 * Class AuthorEntity
 */
class AuthorEntity extends Entity
{
    private $body;
    
    protected $manager;
    
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