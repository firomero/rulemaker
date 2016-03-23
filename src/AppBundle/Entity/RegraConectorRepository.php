<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/23/2016
 * Time: 10:29 AM
 */

namespace AppBundle\Entity;


use Doctrine\ORM\EntityRepository;

class RegraConectorRepository extends EntityRepository
{

    public function PegarIdsFactosPremissaConclicao(Problema $problema, $idRegra, $precondicion){

        $qb = $this->createQueryBuilder('rc');
        $qb->select('rc,rp')
            ->from('AppBundle:RegraConector','rc')
            ->leftJoin('AppBundle:Regra_producao','rp',\Doctrine\ORM\Query\Expr\Join::WITH,'rc.regra.id=rp.id')
            ->where($qb->expr()->eq('rp.problema.id',$problema->getId()))
            ->andWhere($qb->expr()->eq('rc.regra.id',$idRegra))
            ->andWhere($qb->expr()->like('rc.premisa',$precondicion));
        return $qb->getQuery()->getResult();



    }
}