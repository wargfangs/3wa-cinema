<?php

namespace WA\BoBundle\Services;

use Symfony\Component\HttpFoundation\Request;
use WA\BoBundle\Entity\Movies;

use Doctrine\ORM\EntityManager;

class VisibleServices
{

    protected $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }

    public function visibleIndex($id)
    {

        $visible = $this->em ->getRepository('WABoBundle:Movies')->findOneById($id);

        if($visible->getVisible($id) == true){
            $visible->setVisible(false);
            //die(var_dump($movie));
        }
        else{
            $visible->setVisible(true);
        }

        $this->em->persist($visible);
        $this->em->flush();

    }

}
