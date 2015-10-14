<?php
namespace Hangman\Bundle\ApiBundle\Controller;

use Hangman\Bundle\ApiBundle\HangmanApiBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Hangman\Bundle\ApiBundle\Entity;


class HelloWorldController extends Controller
{
    public function helloWorldAction()
    {
        $game = $this->getDoctrine()->getRepository('HangmanApiBundle:Game')->create();
        die(var_dump($game));
        return new Response(
            'Hello world!'
        );
    }
}