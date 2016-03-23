<?php
namespace AppBundle\Manager;
use AppBundle\Entity\Problema;
use AppBundle\Entity\Regra_producao;

/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 2:25 PM
 */
class RegraManager extends Manager
{



    /**
     * @param $problema
     * @return Regra_producao
     * @throws \Exception
     */
    public function SalvarRegra($problema){
        $em = $this->entityManager;
        /**
         * @var Problema $problema
         */
        $problema = $em->getRepository('AppBundle:Problema')->findOneBy(array(
            'nombre'=>$problema
        ));

        /**
         * @var Regra_producao $regra
         */
        $regra = new Regra_producao();
        $regra->setNombre($problema);
        $regra->setProblema($problema);
        try{
            $em->persist($regra);
            $em->flush();
        }
        catch (\Exception $e)
        {
            throw $e;

        }
        return $regra;
    }
}