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
class WordRepository extends EntityRepository
{
    /**
     * @return int
     */
    public function getHighestId()
    {
        $em = $this->getEntityManager();
        $highestId = $em->createQueryBuilder()
            ->select('MAX(e.id)')
            ->from('HangmanApiBundle:word', 'e')
            ->getQuery()
            ->getSingleScalarResult();
        return $highestId;
    }

    public function getRandomWord()
    {
        $highestId = $this->getHighestId();
        $rand = rand(1, $highestId);
        $word = $this->find($rand);
        return $word->getWord();
    }
}