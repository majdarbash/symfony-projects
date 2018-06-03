<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 8:55 AM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/test/json-response")
     */
    public function response()
    {
        return new JsonResponse(['message' => 'this is some Json data'], 200);
    }

    /**
     * @Route("/test/json-response-short")
     */
    public function jsonResponseWithShort()
    {
        return $this->json(['message' => 'This is another way to return JSON.']);
    }

    /**
     * @Route("/test/404")
     */
    public function test404()
    {
        throw $this->createNotFoundException("The current page does not exist!");
    }

}