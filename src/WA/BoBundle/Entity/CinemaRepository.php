<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CinemaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CinemaRepository extends EntityRepository
{
    public function getAllCinemasByNumber()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(ci.title) FROM WABoBundle:Cinema ci'
            )
            ->getSingleScalarResult();
    }

}
