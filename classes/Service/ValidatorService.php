<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 02/12/16
 * Time: 11:00
 */

namespace Aston\Service;

use Respect\Validation\Validator as v;

class ValidatorService implements ServiceInterface
{

    public static function getLibrary()
    {
        return new v;
    }

}