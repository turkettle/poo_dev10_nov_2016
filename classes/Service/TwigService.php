<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 02/12/16
 * Time: 10:19
 */

namespace Aston\Service;


class TwigService implements ServiceInterface
{

    public static function getLibrary()
    {

        $loader = new \Twig_Loader_Filesystem('../templates');
        $twig = new \Twig_Environment($loader, array(
            // 'cache' => '/path/to/compilation_cache',
            'debug' => true,
        ));
        $twig->addExtension(new \Twig_Extension_Debug());

        return $twig;
    }

}