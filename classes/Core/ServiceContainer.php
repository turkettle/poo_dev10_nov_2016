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

    public function get($id)
    {
        if ($id == 'twig') {

            if (!isset($this->services[$id])) {
                $loader = new \Twig_Loader_Filesystem('../templates');
                $twig = new \Twig_Environment($loader, array(
                    // 'cache' => '/path/to/compilation_cache',
                    'debug' => true,
                ));
                $twig->addExtension(new \Twig_Extension_Debug());
                $this->services[$id] = $twig;
                print 'TWIG CREE<br/>';
            }

            return $this->services[$id];
        }
    }

    public function has($id)
    {
    }

}