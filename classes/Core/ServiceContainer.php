<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 01/12/16
 * Time: 16:28
 */

namespace Aston\Core;

use Psr\Container\ContainerInterface;


class ServiceContainer implements ContainerInterface
{
    private $services = [];
    private static $instance = null;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            $class = '\\' . __CLASS__;
            self::$instance = new $class;
        }

        return self::$instance;
    }

    public function get($id)
    {
        if (!isset($this->services[$id])) {

            $service_class = '\Aston\Service\\' . ucfirst($id) . 'Service';
            if (class_exists($service_class)) {
                $service = $service_class::getLibrary();
                $this->services[$id] = $service;
            } else {
                throw new \Exception('Le service "' .  ucfirst($id) . 'Service" n\'existe pas.');
            }
        }

        return $this->services[$id];
    }

    public function has($id)
    {
    }

}