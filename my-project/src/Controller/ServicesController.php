<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 9:16 AM
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

class ServicesController
{


    /**
     * @Route("/test/log")
     */
    public function logging(LoggerInterface $logger)
    {

        $logger->info("Logging a message");

        $logger->log(LogLevel::ALERT, "This should log an alert");

        return new Response("
                    We have just logged an info and alert.<br/>This was done through DI'ing the logger.
                    For more DI'able services check: <pre>bin/console debug:autowiring</pre>
        ");
    }

}