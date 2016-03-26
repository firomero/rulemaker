<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/24/2016
 * Time: 11:47 AM
 */

namespace AppBundle\Model;


use AppBundle\Entity\Facto;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;

class RaciocinioModel
{

    protected $baseConocimiento;
    protected $em;

    /**
     * RaciocinioModel constructor.
     * @param $problema
     * @param EntityManager $em
     */
    public function __construct($problema,EntityManager $em)
    {
        $this->baseConocimiento = new BaseConocimientoModel($em);
        $this->baseConocimiento->setProblema($problema);
        $this->em = $em;

    }

    public function AdicionarRegla(array $lis_variables_pre, array $lis_operadores_pre, array $lis_valores_pre, array  $lits_numerico_o_literal, array $lis_conectores_pre, array $lis_variables_con, array $lis_operadores_con, array $lis_valores_con, array $lis_conectores_con, $ni)
    {
        $this->baseConocimiento->AgregarRegraNova($lis_variables_pre, $lis_operadores_pre, $lis_valores_pre, $lits_numerico_o_literal, $lis_conectores_pre, $lis_variables_con, $lis_operadores_con, $lis_valores_con, $lis_conectores_con, $ni);
    }

    public function MotorInferencia(array $factos){
        $conclusion = array();
        $concordancia = array();
        $activarRegla = 0;
        $cantidad = $this->baseConocimiento->CantidadReglas();
    }

    protected function OperadoresNosFactosPremisas($factosPreguntas, $posregra,$listaConcordacia){
        $cont_activar_regla = 0;
        $size = $this->baseConocimiento->getRegra($posregra)->getPremisasCollection();

        /**
         * @var ArrayCollection $size
         */
        $count = $size->count();
        for ($i=0;$i<$count;$i++) {
            $operador = $this->baseConocimiento->getRegra($posregra)->getPremisasCollection()[$i];
            /**
             * @var Facto $operador
             */
            $literal=$operador->getValorLiteral();
            $fOperator = $operador->getOperador();
            $valorNumerico = $operador->getValorNumerico();
            $currentFactoPregunta = $factosPreguntas[$i];
            /**
             * @var Facto $currentFactoPregunta
             */

            if ($literal=="") {
                switch ($fOperator){
                    case Operador::EQUAL :
                        $cont_activar_regla = $valorNumerico==$currentFactoPregunta->getValorNumerico()?1:0;
                        break;
                    case Operador::LESS:
                        $cont_activar_regla = $valorNumerico<$currentFactoPregunta->getValorNumerico()?1:0;
                        break;
                    case Operador::GREATER:
                        $cont_activar_regla = $valorNumerico>$currentFactoPregunta->getValorNumerico()?1:0;
                        break;

                    //I think this out of concept, because if not equal it is different.
                    case Operador::NOT_EQUAL:
                        $cont_activar_regla = $valorNumerico!=$currentFactoPregunta->getValorNumerico()?1:0;
                        break;
                    case Operador::GREATER_EQUAL:
                        $cont_activar_regla = $valorNumerico>=$currentFactoPregunta->getValorNumerico()?1:0;
                        break;
                    case Operador::LESS_EQUAL:
                        $cont_activar_regla = $valorNumerico<=$currentFactoPregunta->getValorNumerico()?1:0;
                        break;
                    default:
                        break;

                }
    
            }
            else{
                switch ($fOperator){
                    case Operador::EQUAL:
                        $cont_activar_regla = $literal==$currentFactoPregunta->getValorLiteral()?1:0;
                        break;
                    case Operador::NOT_EQUAL:
                        $cont_activar_regla = $literal!=$currentFactoPregunta->getValorLiteral()?1:0;
                        break;
                    default:
                        break;
                }
            }

            $listaConcordacia[]=$cont_activar_regla;
            $cont_activar_regla = 0;
        }
        
        return $listaConcordacia;

    }


    /**
     * @param $activarRegla
     * @param array $concordancia
     * @param $posregra
     * @return int|mixed
     */
    protected function ConectoresLogicos($activarRegla, array $concordancia, $posregra){
        $size = $this->baseConocimiento->getRegra($posregra)->getConectorPremisaCollection()->count();
        if ($size>0) {
            $activarRegla = $concordancia[0];
            $bandeira = false;
            for ($i = 0;$i<$size;$i++) {
                if ($this->baseConocimiento->getRegra($posregra)->getPremisasCollection()->get($i)=="e") {
                    if ($bandeira) {
                        $activarRegla*=$concordancia[$i]*$concordancia[$i+1];
                    } else {
                        $activarRegla = 1;
                        $bandeira = false;
                    }
                }


                if ($this->baseConocimiento->getRegra($posregra)->getPremisasCollection()->get($i)=="ou") {
                        $activarRegla+=$concordancia[$i]+$concordancia[$i+1];
                    if ($activarRegla!=0) {
                        $bandeira = true;
                    }
                }
            }
        }
        else{
            $activarRegla = $concordancia[0];
        }

        return $activarRegla;
    }

    /**
     * @param array $factoPregunta
     * @param $posRegra
     * @param $posFactoRegra
     * @return int
     */
    protected function ProcurarFactoPregunta(array $factoPregunta, $posRegra, $posFactoRegra){
        $posicaoFacto = 0;
        for ($i =0;$i<count($factoPregunta);$i++) {
            if ($this->baseConocimiento->getRegra($posRegra)->getPremisasCollection()->get($posFactoRegra)->getVariavel()==$factoPregunta[$i]->getVariavel()) {
                $posicaoFacto = $i;
            }
        }
        return $posicaoFacto;
    }
}