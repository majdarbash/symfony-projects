<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{

    public function number()
    {
        $number = mt_rand(0, 100);
        return new Response(
            '<html><body>Your lucky number is: ' . $number . '</body></html>'
        );
    }

    /**
     * @Route("/lucky/number-annotated")
     */
    public function numberRouteAnnotated()
    {
        return $this->number();
    }

}