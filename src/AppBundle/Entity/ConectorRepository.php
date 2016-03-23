<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/23/2016
 * Time: 10:47 AM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;

class ConectorRepository extends EntityRepository

{

    public function PegarConectorRegra($idConector){
        return $this->_em->getRepository('AppBundle:Conector')->find($idConector);
    }

}