<?php

namespace WA\BoBundle\Services;

use Symfony\Component\HttpFoundation\RequestStack;
use knp\component\Pager\Paginator;


class PaginatorServices
{


    protected $paginator;
    protected $request;

    public function __construct(Paginator $paginator,
                                RequestStack $request){

        $this->paginator = $paginator;
        $this->request = $request;
    }

    public function paginatorIndex($entities)
    {

        $pagination = $this->paginator->paginate(
            $entities,
            $this->request->getCurrentRequest()->query->get('page', 1)/*page number*/,
            5/*limit per page*/);
        return $pagination;

    }

}