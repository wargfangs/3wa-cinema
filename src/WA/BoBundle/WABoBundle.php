<?php

namespace WA\BoBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WABoBundle extends Bundle
{
    public function getParent(){
        return 'FOSUserBundle';
    }
}
