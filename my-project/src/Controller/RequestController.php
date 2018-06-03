<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 10:51 AM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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

    /**
     * @Route("/test/session-info")
     */
    public function testSessionInfo(SessionInterface $session)
    {
        return new JsonResponse([
            'sessionId' => $session->getId(),
            'sessionName' => $session->getName()
        ]);
    }

    /**
     * @Route("/test/request-extended-info")
     */
    public function testExtendedInfo(Request $request)
    {
        $data = [
            'Is XML Request?' => $request->isXmlHttpRequest() ? 'yes' : 'no',
            'Preferred Language' => $request->getPreferredLanguage(['en', 'fr']),
            'Server Host' => $request->server->get('HTTP_HOST'),
            'Header Host' => $request->headers->get('host'),
            'Content Type' => $request->headers->get('content_type')
        ];

        return $this->render('request/info.html.twig', [
            'data' => $data
        ]);
    }

    /**
     * @Route("/test/session")
     */
    public function testSession(SessionInterface $session)
    {
        $session->set('firstName', 'Angel');
        return $this->redirectToRoute('test_session_read');
    }

    /**
     * @Route("/test/session-read", name="test_session_read")
     */
    public function testSessionRead(SessionInterface $session)
    {
        return new Response('Reading session firstName: ' . $session->get('firstName'));
    }


    /**
     * @Route("/test/flash")
     */
    public function testFlash()
    {
        $this->addFlash('notice', 'First notice!');
        $this->addFlash('notice', 'Second notice!');

        return $this->redirectToRoute('test_flash_read');
    }

    /**
     * @Route("/test/flash-read", name="test_flash_read")
     * @param SessionInterface $session
     * @return Response
     */
    public function testFlashRead(SessionInterface $session)
    {
        $flashMessage = $session->getFlashBag()->get('notice');
        return new JsonResponse($flashMessage);
    }

}