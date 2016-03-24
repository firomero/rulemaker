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
<<<<<<< HEAD
 * @param Facto $facto
 * @return Facto
 * @throws \Exception
 */
   public function SaveFacto(Facto $facto){
      $em = $this->entityManager;
=======
    * @param Facto $facto
    * @return Facto
    * @throws \Exception
    */
   public function SaveFacto(Facto $facto){
       $em = $this->entityManager;
>>>>>>> f888585958ac5d79ea1e0c1eb7c7b46434325de6
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