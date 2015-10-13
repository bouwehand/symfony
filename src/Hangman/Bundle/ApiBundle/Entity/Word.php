<?php
/**
 * Word.php
 *
 * Word model
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
 * @ORM\Entity(repositoryClass="Hangman\Bundle\ApiBundle\Entity\WordRepository")
 * @ORM\Table(name="word")
 */
class Word
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
}