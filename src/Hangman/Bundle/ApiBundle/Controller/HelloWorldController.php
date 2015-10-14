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
        $word = $this
            ->getDoctrine()
            ->getRepository('HangmanApiBundle:Word');

        //die(var_dump($word));
        die(var_dump($word->getRandomWord()));
        return new Response(
            'Hello world!'
        );
    }
}