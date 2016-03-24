<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 2:34 PM
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Facto;

class FactoManager extends Manager
{
   /**
 * @param Facto $facto
 * @return Facto
 * @throws \Exception
 */
   public function SaveFacto(Facto $facto){
      $em = $this->entityManager;
      try{
         $em->persist($facto);
         $em->flush();
      }
      catch (\Exception $e)
      {
         throw $e;

      }
      return $facto;
   }
}