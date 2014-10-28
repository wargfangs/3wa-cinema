<?php

namespace WA\BoBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategoriesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoriesRepository extends EntityRepository
{
    public function getAllCategoriesByNumber()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(ca.title) FROM WABoBundle:Categories ca'
            )
            ->getSingleScalarResult();
    }


    public function getMoviesByCat()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT COUNT(m.id) as nbmovies, ca.title
                FROM WABoBundle:Movies m
                JOIN m.categories ca
                WHERE ca.id = m.categories
                GROUP BY m.categories
             '
            )
            ->getResult();
    }
}