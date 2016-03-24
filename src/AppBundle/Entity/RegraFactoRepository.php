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

        $qb = $this->createQueryBuilder('rc');
        $qb->select('rc,rp')
            ->from('AppBundle:RegraFacto','rc')
            ->leftJoin('AppBundle:Regra_producao','rp',\Doctrine\ORM\Query\Expr\Join::WITH,'rc.regra.id=rp.id')
            ->where($qb->expr()->eq('rp.problema.id',$problema->getId()))
            ->andWhere($qb->expr()->eq('rc.regra.id',$idRegra))
            ->andWhere($qb->expr()->like('rc.premisa',$precondicion));
        return $qb->getQuery()->getResult();



    }

}