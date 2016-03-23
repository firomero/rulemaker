<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 11:44 AM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Symfony\Component\Config\Definition\Exception\Exception;

class ProblemaRepository extends EntityRepository
{


    /**
     * @param $problema
     * @return mixed
     */
    public function Regras($problema){
    $em = $this->_em;
    $problema = $em->getRepository('AppBundle:Problema')->findOneBy(array(
        'nombre'=>$problema
    ));

    return $problema->getRegras();
}

    

    
}