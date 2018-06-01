<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 8:01 AM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class GenerateUrlController extends Controller
{

    /**
     * @Route("/test/generate-url", name="test_url")
     */
    public function test()
    {
        $url = $this->generateUrl(
            'people_show',
            ['slug' => 'test', 'param' => 'value']
        );

        return new Response($url);
    }

    /**
     * @Route("/test/generate-absolute-url", name="test_absolute_url")
     */
    public function testAbsoluteUrl()
    {
        $url = $this->generateUrl(
            'people_show',
            ['slug' => 'test', 'param' => 'value'],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        return new Response($url);
    }

    /**
     * @Route("/test/twig-url", name="test_twig_url")
     */
    public function testUrlInTwig()
    {
        return $this->render('/test/url-in-twig.html.twig');
    }

}