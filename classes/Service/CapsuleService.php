<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 02/12/16
 * Time: 11:00
 */

namespace Aston\Service;

use Illuminate\Database\Capsule\Manager as Capsule;

class CapsuleService implements ServiceInterface
{

    public static function getLibrary()
    {
        $capsule = new Capsule;
        $capsule->addConnection(array(
            'driver'    => 'mysql',
            'host'      => 'mysql.server.com',
            'database'  => 'aston',
            'username'  => 'root',
            'password'  => 'paris',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        
        return $capsule;
    }

}