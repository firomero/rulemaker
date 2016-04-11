<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 26/03/2016
 * Time: 9:10 AM
 */

namespace AppBundle\Agent;


use AppBundle\Entity\Facto;
use AppBundle\Model\Operador;
use AppBundle\Model\RaciocinioModel;
use AppBundle\Model\Type;
use Doctrine\ORM\EntityManager;

trait Agent
{
    /**
     * Sample Inference Output
     * @param string $name
     * @param EntityManager $em
     * @return mixed
     */
    public function SampleOuput($name, $em){
        try{

            $raciocinio = new RaciocinioModel($name,$em);
        }
        catch (\Exception $e){

        }
        $lval = array();
        $lcon = array();
        $lvariavles_pre1 = array();
        $lopredores_pre1 = array();
        $lvalor_pre1= array();
        $lconectores_pre1 = array();
        $lnumerico_o_literal_pre1 = array();
        $lvariavles_con1 = array();
        $lopredores_con1 = array();
        $lvalor_con1 = array();
        $lconectores_con1 = array();
        $lvariavles_pre1[]="estancia do producto";
        $lopredores_pre1[]=Operador::GREATER;
        $lvalor_pre1[]=40;
        $lnumerico_o_literal_pre1[]=Type::NUMERICO;
        $lvariavles_con1[]="alerta";
        $lopredores_con1[]=Operador::EQUAL;
        $lvalor_con1[]="producto em risco";
        $ni=1;
        /** @var RaciocinioModel $raciocinio */
        $raciocinio->AdicionarRegla($lvariavles_pre1, $lopredores_pre1, $lvalor_pre1, $lnumerico_o_literal_pre1, $lconectores_pre1, $lvariavles_con1, $lopredores_con1, $lvalor_con1, $lconectores_con1, $ni);
        $facto = new Facto();
        $facto->setVariavel("estancia do producto no estoque");
        $facto->setOperador(Operador::EQUAL);
        $facto->setValorBooleano(false);
        $facto->setValorNumerico(80);
        $facto->setValorLiteral("");
        $lval[]=$facto;
        $lcon = $raciocinio->MotorInferencia($lval);
        return array_map(function(Facto $facto){
            array(
                'variavel'=>$facto->getVariavel(),
                'valor'=>$facto->getValorLiteral()==""?$facto->getValorNumerico():$facto->getValorLiteral()
            );
        },$lcon);

    }

}