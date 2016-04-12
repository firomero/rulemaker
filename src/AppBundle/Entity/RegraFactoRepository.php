<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/23/2016
 * Time: 4:36 PM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;

class RegraFactoRepository extends EntityRepository
{
    public function PegarIdsFactoPremissaConclicao(Problema $problema, $idRegra, $precondicion){

        $qb = $this->_em->createQueryBuilder();
        $qb->select('rc','c')
            ->from('AppBundle:RegraFacto','rc')
            ->join('rc.regra','r')
            ->where($qb->expr()->eq('r.problema.id',':problema'))
            ->andWhere($qb->expr()->eq('r.id',':regra'))
            ->andWhere($qb->expr()->like('rc.premisas',':premisa'))
            ->setParameter('problema',$problema->getId())
            ->setParameter('regra',$idRegra)
            ->setParameter('premisa',$precondicion)
        ;

        return $qb->getQuery()->getResult();



    }

}