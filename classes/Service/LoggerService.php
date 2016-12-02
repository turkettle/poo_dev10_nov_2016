<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 02/12/16
 * Time: 11:00
 */

namespace Aston\Service;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class LoggerService implements ServiceInterface
{

    public static function getLibrary()
    {
        // create a log channel
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('../log/aston.log', Logger::WARNING));

        return $log;
    }

}