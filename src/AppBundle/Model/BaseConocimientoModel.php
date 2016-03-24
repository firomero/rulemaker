<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/23/2016
 * Time: 1:54 PM
 */

namespace AppBundle\Model;


use AppBundle\Entity\Conector;
use AppBundle\Entity\Facto;
use AppBundle\Entity\Regra_producao;
use AppBundle\Entity\RegraConector;
use AppBundle\Entity\RegraFacto;
use AppBundle\Manager\RegraManager;
use Doctrine\ORM\EntityManager;

class BaseConocimientoModel
{
    protected $list;
    protected $em;
    protected $problema;

    /**
     * @return mixed
     */
    public function getProblema()
    {
        return $this->problema;
    }

    /**
     * @param mixed $problema
     */
    public function setProblema($problema)
    {
        $this->problema = $problema;
    }

    /**
     * BaseConocimientoModel constructor.
     * @param $em
     */
    public function __construct(EntityManager $em)
    {
        $this->list = array();
        $this->em = $em;

    }

    /**
     * adiciona una nueva regla
     * @param array $lis_variables_pre
     * @param array $lis_operadores_pre
     * @param array $lis_valores_pre
     * @param array $lits_numerico_o_literal
     * @param array $lis_conectores_pre
     * @param array $lis_variables_con
     * @param array $lis_operadores_con
     * @param array $lis_valores_con
     * @param array $lis_conectores_con
     * @param $ni
     */
    public function AgregarRegraNova(array $lis_variables_pre, array $lis_operadores_pre, array $lis_valores_pre, array  $lits_numerico_o_literal, array $lis_conectores_pre, array $lis_variables_con, array $lis_operadores_con, array $lis_valores_con, array $lis_conectores_con, $ni){
        $em = $this->em;
        $regra = new Regra_producao();
        $regra->setNombre("R".count($this->list));
        //beginTrans
        $em->beginTransaction();
        $em->persist($regra);
        foreach ($lis_variables_pre as $key=>$value) {
            $facto = new Facto();
            $facto->setVariavel($value);
            $facto->setOperador($lis_operadores_pre[$key]);
            $facto->setValorBooleano(false);
            $facto->setValorNumerico($lis_valores_pre[$key]);
            $facto->setValorLiteral("");
            if ($lits_numerico_o_literal[$key]!="num") {
                $facto->setValorNumerico(0);
                $facto->setValorLiteral($lis_valores_pre[$key]);

            }
            $em->persist($facto);
            $regraFacto = new RegraFacto();
            $regraFacto->setFacto($facto);
            $regraFacto->setPremisas("pre");
            $regraFacto->setRegra($regra);
            $em->persist($regraFacto);
            if ($key<count($lis_conectores_pre)) {
                $regra->setRegraConector($lis_conectores_pre[$key]);
                $conector = new Conector();
                $conector->setSignal($lis_conectores_pre[$key]);
                $regraConector = new RegraConector();
                $regraConector->setRegra($regra);
                $regraConector->setConector($conector);
                $regraConector->setPremisas("pre");
                $em->persist($conector);
                $em->persist($regraConector);
            }
        }




        foreach ($lis_variables_con as $key=>$value) {
            $facto = new Facto();
            $facto->setVariavel($lis_variables_con[$key]);
            $facto->setOperador($lis_operadores_con[$key]);
            $facto->setValorBooleano(false);
            $facto->setValorNumerico(0);
            $facto->setValorLiteral($lis_valores_con[$key]);
            if ($lis_valores_con[$key]!="") {
                $facto->setValorNumerico($lis_valores_con[$key]);
                $facto->setValorLiteral("");
            }
            $regra->setNodoConclusion($facto);
            $regraFacto = new RegraFacto();
            $regraFacto->setPremisas("con");
            $regraFacto->setRegra($regra);
            $regraFacto->setFacto($facto);
            if ($key<count($lis_conectores_con)) {
                $regra->setConectorConclusion($lis_conectores_con[$key]);
                $conector = new Conector();
                $conector->setSignal($lis_conectores_con[$key]);
                $regraConector = new RegraConector();
                $regraConector->setRegra($regra);
                $regraConector->setConector($conector);
                $regraConector->setPremisas("con");
                $em->persist($conector);
                $em->persist($regraConector);

            }


            $regra->setNivel($ni);
            $contador =array_reduce($this->list,function($a,$b)use($ni){
                if ($b instanceof Regra_producao) {
                    if ($b->getNivel()==$ni) {
                        $a++;
                    }
                }
                return $a;
            });

            $this->list[$contador]=$regra;

            $em->persist($facto);
            $em->persist($regra);
            $em->persist($regraFacto);

        }

       try{
           $em->flush();
           $em->commit();
       }
       catch (\Exception $e){
           $em->rollback();
       }

    }

    /**
     *Load database rules
     */
    public function CargarRegrasBaseDados(){

        $ids_resgras_do_problema = $this->em->getRepository('AppBundle:Problema')->Regras($this->problema);
        foreach ($ids_resgras_do_problema as $regraProblema) {
            $regraProducao = new Regra_producao();
            /**
             * @var Regra_producao $regraProblema
             */
            $ids_factos_premissa = $this->em->getRepository('AppBundle:RegraFacto')->PegarIdsFactoPremissaConclicao($this->em->getRepository('AppBundle:Problema')->findOneBy(array('nombre'=>$this->problema)),$regraProblema->getId(),"pre");
            foreach ($ids_factos_premissa as $p) {
                $facto = $this->em->getRepository('AppBundle:Facto')->find($p->getFacto()->getId());
                $regraProducao->setNodoPremisa($facto);
            }
            $ids_conectores_premissas = $this->em->getRepository('AppBundle:RegraConector')->PegarIdsConectoresPremissaConclicao($this->em->getRepository('AppBundle:Problema')->findOneBy(array('nombre'=>$this->problema)),$regraProblema->getId(),"pre");
            foreach ($ids_conectores_premissas as $key=>$value) {
                $conector = $this->em->getRepository('AppBundle:Conector')->find($value->getConector()->getId());

                $regraProducao->setConectorPremisa($conector);
            }

            $ids_factos_conclucao = $this->em->getRepository('AppBundle:RegraFacto')->PegarIdsFactoPremissaConclicao($this->em->getRepository('AppBundle:Problema')->findOneBy(array('nombre'=>$this->problema)),$regraProblema->getId(),"con");
            foreach ($ids_factos_conclucao as $p) {
                $facto = $this->em->getRepository('AppBundle:Facto')->find($p->getFacto()->getId());
                $regraProducao->setNodoConclusion($facto);
            }
            $ids_conectores_conclucao = $this->em->getRepository('AppBundle:RegraConector')->PegarIdsConectoresPremissaConclicao($this->em->getRepository('AppBundle:Problema')->findOneBy(array('nombre'=>$this->problema)),$regraProblema->getId(),"con");
            foreach ($ids_conectores_conclucao as $key=>$value) {
                $conector = $this->em->getRepository('AppBundle:Conector')->find($value->getConector()->getId());

                $regraProducao->setConectorConclusion($conector);
            }

            $this->list[]=$regraProducao;
        }
        return $this->list;


    }
}