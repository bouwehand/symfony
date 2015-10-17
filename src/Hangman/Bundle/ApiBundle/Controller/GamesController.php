<?php

namespace Hangman\Bundle\ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GamesController extends Controller
{
    /**
     * @Route("/games/{character}", defaults={"character": "0"})
     */
    public function gamesAction($character)
    {
        $repo = $this->getDoctrine()->getRepository('HangmanApiBundle:Game');
        if (empty($id) && empty($character)) {
            $game = $repo->create();
        } else {
            $id = $repo->getHighestId();
            $game = $repo->guess($id, $character);
        }
        return new Response(
            json_encode(array (
              "status" => $game->getStatus(),
              "tries_left" => $game->getTriesLeft(),
              "Characters guessed" => json_decode($game->getCharactersGuessed())
            ))
        );
    }
}
