<?php

namespace Aston\Manager;

use Aston\Entity\EntityInterface;

/**
 * Class AuthorEntityManager.
 */
class AuthorEntityManager extends EntityManager
{
    
    protected $table = 'author';
    
    public function addEntity(EntityInterface $entity)
    {
        $query = $this->db->prepare('INSERT INTO author (title, body) VALUES (:title, :body)');
        $query->bindValue(':title', $entity->getTitle());
        $query->bindValue(':body', $entity->getBody());
        
        $executed = $query->execute();
        // $errors = $this->db->errorInfo();
        // \Kint::dump($errors);
        // \Kint::dump($executed);
    }
    
    public function getEntities(array $ids)
    {
    }
}