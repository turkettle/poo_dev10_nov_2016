<?php

namespace Aston\Entity;

use Aston\Entity\EntityInterface;
use Aston\Manager\BookEntityManager;

/**
 * Class BookEntity
 */
class BookEntity implements EntityInterface
{
    private $id;
    private $title;
    private $author;
    private $body;

    protected $manager;

    public function __construct(BookEntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function save()
    {
        $this->manager->addBook($this);
    }

    public function load($id)
    {

        // if (is_numeric($id)) {
        //     $this = $this->manager->getBook($id);
        // } elseif (is_array($id)) {
        //     $this = $this->manager->getBooks($id);
        // } else {
        //     throw new Exception('Mauvais format de donée pour la méthode load().');
        // }
    }

    public function delete()
    {
    }

    public function create()
    {
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

}