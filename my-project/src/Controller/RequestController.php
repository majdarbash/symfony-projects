<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 10:51 AM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RequestController extends Controller
{

    /**
     * @Route("/test/request-params", name="test_request_params")
     */
    public function index(Request $request)
    {
        $response = [];

        $response[] = 'Method: ' . $request->getMethod();
        $response[] = 'GET[param]: ' . $request->get('param', 'no value found');

        $response[] = '';
        $response[] = 'You can provide the param using: <pre>' . $this->generateUrl('test_request_params', ['param' => 'value'], UrlGeneratorInterface::ABSOLUTE_URL) . '</pre>';

        return new Response(implode("<br/>", $response));
    }

}