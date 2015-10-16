<?php
/**
 * WordRepository.php
 *
 * Custom Repo class
 *
 * @category Youwe Development
 * @package symfony
 * @author Bas Ouwehand <b.ouwehand@youwe.nl>
 * @date 10/13/15
 *
 */
namespace Hangman\Bundle\ApiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Class WordRepository
 *
 * @package Hangman\Bundle\ApiBundle\Entity
 */
class GameRepository extends EntityRepository
{
    /**
     * Create a new game
     */
    public function create()
    {
        $game = new Game();
        $randomWord =  $this
            ->getEntityManager()
            ->getRepository('HangmanApiBundle:Word')
            ->getRandomWord();
        $game->setWord($randomWord);
        $game->setTriesLeft(11);
        $game->setStatus('busy');
        $guess = json_encode(array());
        $game->setCharactersGuessed($guess);
        $em = $this->getEntityManager();
        $em->persist($game);
        $em->flush();

        return $game;
    }

    /**
     * @param $gameId
     * @param $character
     * @return bool
     * @throws \Exception
     */
    public function guess($gameId, $character)
    {
        $success = false;
        if(! is_string($character) && ! strlen($character) == 1) {
            throw new \Exception("Not a valid input");
        }
        $game = $this->find($gameId);
        if(!$game) {
            throw new \Exception("game $gameId not found!");
        }
        // can only play on a busy game
        if (! $game->getStatus() == 'busy') {
            return false;
        }

        $guessed = json_decode($game->getCharactersGuessed());
        if (in_array($character, $guessed)) {
            // you already have that one
            return false;
        }
        $em = $this->getEntityManager();

        // very good
        $word = str_split($game->getWord());
        // do all same characters ( play the game like how i played when i was little )
        foreach($word as $k => $v) {
            if ($character == $v) {
                $guessed[$k] = $v;
                $success = true;
            }
        }
        $guessed = json_encode($guessed);
        $game->setCharactersGuessed($guessed);
        if (count($guessed) == strlen($game->getWord()) ) {
            $game->setStatus('success');
        }

        if($success) {
            $em->persist($game);
            $em->flush();
            return true;
        }

        // not so good
        $tries = $game->getTriesLeft();

        $tries -= 1;
        $game->setTriesLeft($tries);
        if (empty($tries)) {
            $game->setStatus('fail');
        }
        $em->persist($game);
        $em->flush();
        return false;
    }
}