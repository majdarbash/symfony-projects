<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 8:51 AM
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RedirectController extends Controller
{

    /**
     * @Route("/test/redirect-to-homepage")
     */
    public function redirectToHomePage()
    {
        return $this->redirectToRoute('homepage');
    }

    /**
     * @Route("/test/redirect-with-params")
     */
    public function redirectWithParams()
    {
        return $this->redirectToRoute('people_show', ['slug' => 'Alexandr'], 301);
    }

    /**
     * @Route("/test/redirect-to-google")
     */
    public function redirectToGoogle()
    {
        return $this->redirect('https://www.google.com');
    }

}