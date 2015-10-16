<?php
/**
 * Game.php
 *
 * Game model
 *
 * @category Youwe Development
 * @package symphony
 * @author Bas Ouwehand <b.ouwehand@youwe.nl>
 * @date 10/13/15
 *
 */
namespace Hangman\Bundle\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Hangman\Bundle\ApiBundle\Entity\GameRepository")
 * @ORM\Table(name="game")
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $word;

    /**
     * @ORM\Column(type="integer")
     */
    protected $tries_left;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    /**
     * @ORM\Column(type="string")
     */
    protected $characters_guessed;

    /**
     * @return string $id
     */
    public function getId()
    {
        return $this->id();
    }

    /**
     * @return string $word
     */
    public function getWord()
    {
        return $this->word;
    }

    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * @param mixed $characters_guessed
     */
    public function setCharactersGuessed($characters_guessed)
    {
        $this->characters_guessed = $characters_guessed;
    }

    /**
     * @return mixed
     */
    public function getCharactersGuessed()
    {
        return $this->characters_guessed;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $tries_left
     */
    public function setTriesLeft($tries_left)
    {
        $this->tries_left = $tries_left;
    }

    /**
     * @return mixed
     */
    public function getTriesLeft()
    {
        return $this->tries_left;
    }
}