<?php

namespace Aston\Manager;

use Aston\Entity\BookEntity;

/**
 * Class BookEntityManager.
 */
class BookEntityManager
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function addBook(BookEntity $book)
    {

        $query = $this->db->prepare('INSERT INTO book (title, author, body) VALUES (:title, :author, :body)');
        $query->bindValue(':title', $book->getTitle());
        $query->bindValue(':author', $book->getAuthor());
        $query->bindValue(':body', $book->getBody());

        $executed = $query->execute();
        // $errors = $db->errorInfo();
        // Kint::dump($errors);
        // Kint::dump($executed);
    }

    public function getBook($id)
    {
    }

    public function getBooks(array $ids)
    {
    }
}