<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/23/2016
 * Time: 10:10 AM
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * RegraFacto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RegraFactoRepository")
 */
class RegraFacto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden_regra", type="integer")
     */
    protected $ordenRegra;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return int
     */
    public function getOrdenRegra()
    {
        return $this->ordenRegra;
    }

    /**
     * @param int $ordenRegra
     */
    public function setOrdenRegra($ordenRegra)
    {
        $this->ordenRegra = $ordenRegra;
    }

    /**
     * @return string
     */
    public function getPremisas()
    {
        return $this->premisas;
    }

    /**
     * @param string $premisas
     */
    public function setPremisas($premisas)
    {
        $this->premisas = $premisas;
    }

    /**
     * @return mixed
     */
    public function getRegra()
    {
        return $this->regra;
    }

    /**
     * @param mixed $regra
     */
    public function setRegra($regra)
    {
        $this->regra = $regra;
    }

    /**
     * @return mixed
     */
    public function getFacto()
    {
        return $this->facto;
    }

    /**
     * @param mixed $conector
     */
    public function setFacto($facto)
    {
        $this->facto = $facto;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="premisas", type="text")
     */
    private $premisas;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Regra_producao", inversedBy="regraConector")
     * @ORM\JoinColumn(name="id_regra", referencedColumnName="id")
     *
     */
    private $regra;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Facto", inversedBy="regraFacto")
     * @ORM\JoinColumn(name="id_facto", referencedColumnName="id")
     */
    private $facto;
}