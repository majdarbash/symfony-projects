<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 7:50 AM
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrailingSlashController extends Controller
{

    /**
     * @Route("/trailing/list/")
     * @return Response
     */
    public function trailingSlash()
    {
        return new Response("Try /trailing/list and /tailing/list/. Check the URL above if redirect has occurred.<h2><pre>In such case redirect should happen from /trailing/list -> /trailing/list/</pre></h2>");
    }

}