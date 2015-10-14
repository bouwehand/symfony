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
        return $game;
    }
}