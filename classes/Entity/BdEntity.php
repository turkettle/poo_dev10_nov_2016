<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 30/11/16
 * Time: 11:39
 */

namespace Aston\Entity;


class BdEntity extends BookEntity
{

    private $illustrator;

    /**
     * @return mixed
     */
    public function getIllustrator()
    {
        return $this->illustrator;
    }

    /**
     * @param mixed $illustrator
     */
    public function setIllustrator($illustrator)
    {
        $this->illustrator = $illustrator;
    }

}