<?php
/**
 * Created by PhpStorm.
 * User: majdarbash
 * Date: 6/1/18
 * Time: 7:26 AM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeopleController extends Controller
{

    /**
     * Matches /people exactly
     * @Route("/people/{page}", requirements={"page"="\d+"})
     * @return Response
     */
    public function list($page = 1)
    {
        return new Response('List of people. Viewing the page number: ' . $page);
    }

    /**
     * Matches /people/*
     * @Route("/people/{slug}")
     * @param $slug
     * @return Response
     */
    public function show($slug)
    {
        return new Response('Single item with a slug: ' . $slug);
    }


    /**
     * @Route(
     *     "/people/search/{_locale}/{age}/{keyword}.{_format}",
     *     defaults={"_format"="html"},
     *     requirements={
     *          "_locale"="en|fr",
     *          "_format"="html|rss",
     *          "age"="\d+"
     *     }
     * )
     * @param $_locale
     * @param $age
     * @param $keyword
     * @return Response
     */
    public function search($_locale, $age, $keyword, $_format, $_controller)
    {
        return new Response("Controller in action: $_controller.<br/>Searching for people with locale: $_locale, format: $_format. The search age is $age. The search keyword is $keyword.");
    }



}