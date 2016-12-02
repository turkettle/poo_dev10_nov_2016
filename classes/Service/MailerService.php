<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 02/12/16
 * Time: 11:06
 */

namespace Aston\Service;


class MailerService implements ServiceInterface
{

    public static function getLibrary()
    {

        return \Swift_Message::newInstance();
    }

}