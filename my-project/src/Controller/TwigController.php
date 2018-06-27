<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/16/18
 * Time: 10:50 AM
 */

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TwigController extends Controller
{


    /**
     * @Route("/test-twig-template", name="test_twig_template")
     */
    public function testTwigTemplate()
    {

        return $this->render('twig/child.html.twig', [
            'page_title' => 'Twig template test page',
            'navigation' => [
                [
                    'href' => $this->generateUrl('test_twig_template', [], UrlGeneratorInterface::ABSOLUTE_URL),
                    'caption' => 'item 1'
                ],
                [
                    'href' => $this->generateUrl('test_twig_template', [], UrlGeneratorInterface::ABSOLUTE_URL),
                    'caption' => 'item 2'
                ]
            ],
            'script'=>'<script type="text/javascript">console.log("script is executed")</script>'
        ]);
    }

}