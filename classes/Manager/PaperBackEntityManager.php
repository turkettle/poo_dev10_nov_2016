<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 30/11/16
 * Time: 11:44
 */

namespace Aston\Manager;

use Aston\Entity\BookEntity;


class PaperBackEntityManager extends BookEntityManager
{

    public function __construct(\PDO $db)
    {
        parent::__construct($db);
    }

    public function addBook(EntityInterface $entity)
    {

        $query = $this->db->prepare('INSERT INTO book (title, author, body, genre) VALUES (:title, :author, :body, :genre)');
        $query->bindValue(':title', $entity->getTitle());
        $query->bindValue(':author', $entity->getAuthor());
        $query->bindValue(':body', $entity->getBody());
        $query->bindValue(':illustrator', $entity->getGenre());

        $executed = $query->execute();
        // $errors = $db->errorInfo();
        // Kint::dump($errors);
        // Kint::dump($executed);
    }

}