<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 30/11/16
 * Time: 13:58
 */

namespace Aston\Entity;


interface EntityInterface
{
    public function create();
    public function load($id);
    public function save();
    public function delete();

}