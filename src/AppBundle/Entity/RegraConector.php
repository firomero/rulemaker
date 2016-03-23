<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 2:46 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * RegraConector
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\RegraConectorRepository")
 */
class RegraConector
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
    public function getConector()
    {
        return $this->conector;
    }

    /**
     * @param mixed $conector
     */
    public function setConector($conector)
    {
        $this->conector = $conector;
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
     * @ORM\ManyToOne(targetEntity="Conector", inversedBy="regraConector")
     * @ORM\JoinColumn(name="id_conector", referencedColumnName="id")
     */
    private $conector;


}