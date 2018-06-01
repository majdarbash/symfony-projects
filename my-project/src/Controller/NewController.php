<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewController extends Controller
{
    /**
     * @Route("/new", name="new")
     */
    public function index()
    {
            return $this->render('new/index.html.twig', [
            'controller_name' => 'NewController',
        ]);
    }
}
