<?php

namespace Hangman\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GamesController extends Controller
{
    /**
     * @Route("/games/{id}/{character}", defaults={"id": "0", "character": "0"})
     */
    public function gamesAction($id, $character)
    {
        $request = Request::createFromGlobals();
        $repo = $this->getDoctrine()->getRepository('HangmanApiBundle:Game');
        switch ($request->getMethod()) {
            case "POST" :
                $game = $repo->guess($id, $character);
                break;
            case "PUT" :
                $game = $repo->create();
                break;
            case "GET" :
                break;
        }
        return new Response(
            var_dump($game)
        );
    }
}
