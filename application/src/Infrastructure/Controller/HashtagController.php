<?php
/**
 * Created by PhpStorm.
 * User: rolando.caldas
 * Date: 11/06/2018
 * Time: 18:41
 */

namespace App\Infrastructure\Controller;

use App\Infrastructure\Persistence\Db;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HashtagController
{
    /**
     * @Route("/", name="list_hashtags")
     *
     * @param Environment $twig
     * @return Response
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    function listHashtags(Environment $twig)
    {
        $db = Db::getInstance();

        $hashtags = $db->hashtags();

        return (new Response())->setContent($twig->render('default/hashtag/listHashtags.html.twig', [
            'hashtags' => $hashtags,
        ]));

    }

}