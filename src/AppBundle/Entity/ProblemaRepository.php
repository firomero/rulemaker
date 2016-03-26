<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 11:44 AM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Symfony\Component\Config\Definition\Exception\Exception;

class ProblemaRepository extends EntityRepository
{


    /**
     * @param $problema
     * @return mixed
     * @throws NoResultException
     */
    public function Regras($problema){
    $em = $this->_em;
    $problema = $em->getRepository('AppBundle:Problema')->findOneBy(array(
        'nombre'=>$problema
    ));
        if ($problema==null) {
            throw new NoResultException("No hay problemas definidos");
        }   
        

    return $problema->getRegras();
}

    

    
}