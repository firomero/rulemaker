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
<<<<<<< HEAD
     * @param RegraConector $regraConector
     * @return RegraConector
     * @throws \Exception
     * @internal param RegraConector $facto
=======
     * @param RegraConector $facto
     * @return RegraConector
     * @throws \Exception
>>>>>>> f888585958ac5d79ea1e0c1eb7c7b46434325de6
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