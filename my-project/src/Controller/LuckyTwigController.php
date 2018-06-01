<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 7:11 AM
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class LuckyTwigController extends Controller
{

    /**
     * @Route("/lucky/number/render")
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', [
            'number' => $number
        ]);
    }
}