<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 2:41 PM
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Conector;

class ConectorManager extends Manager
{
    /**
     * @param Conector $conector
     * @return Conector
     * @throws \Exception
     */
    public function SaveConector(Conector $conector){
        $em = $this->entityManager;
        try{
            $em->persist($conector);
            $em->flush();
        }
        catch (\Exception $e)
        {
            throw $e;

        }
        return $conector;
    }
}