<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 22/03/2016
 * Time: 10:05 PM
 */

namespace AppBundle\Manager;


use AppBundle\Entity\RegraConector;

class RegraConectorManager extends Manager
{
    /**
     * @param RegraConector $regraConector
     * @return RegraConector
     * @throws \Exception
     * @internal param RegraConector $facto
     */
    public function SaveFacto(RegraConector $regraConector){
        $em = $this->entityManager;
        try{
            $em->persist($regraConector);
            $em->flush();
        }
        catch (\Exception $e)
        {
            throw $e;

        }
        return $regraConector;
    }
}