<?php

namespace Aston\Manager;

use Aston\Entity\EntityInterface;

/**
 * Class BookEntityManager.
 */
class BookEntityManager extends EntityManager
{
    
    protected $table = 'book';
    
    public function addEntity(EntityInterface $entity)
    {
        $query = $this->db->prepare('INSERT INTO book (title, author, body, genre) VALUES (:title, :author, :body, :genre)');
        $query->bindValue(':title', $entity->getTitle());
        $query->bindValue(':author', $entity->getAuthor());
        $query->bindValue(':body', $entity->getBody());
        $query->bindValue(':genre', $entity->getGenre());
        
        $executed = $query->execute();
        $errors = $this->db->errorInfo();
        // \Kint::dump($errors);
        // \Kint::dump($executed);
    }
    
    public function getEntities(array $ids)
    {
    }
}