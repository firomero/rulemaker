<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Facto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FactoRepository")
 */
class Facto
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
     * @var string
     *
     * @ORM\Column(name="variavel", type="string", length=255)
     */
    private $variavel;

    /**
     * @var string
     *
     * @ORM\Column(name="operador", type="string", length=255)
     */
    private $operador;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valor_booleano", type="boolean")
     */
    private $valorBooleano;

    /**
     * @var integer
     *
     * @ORM\Column(name="valor_numerico", type="integer")
     */
    private $valorNumerico;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_literal", type="string", length=255)
     */
    private $valorLiteral;

    /**
     * Facto constructor.
     */
    public function __construct()
    {
        $this->regraFacto = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set variavel
     *
     * @param string $variavel
     * @return Facto
     */
    public function setVariavel($variavel)
    {
        $this->variavel = $variavel;

        return $this;
    }

    /**
     * Get variavel
     *
     * @return string 
     */
    public function getVariavel()
    {
        return $this->variavel;
    }

    /**
     * Set operador
     *
     * @param string $operador
     * @return Facto
     */
    public function setOperador($operador)
    {
        $this->operador = $operador;

        return $this;
    }

    /**
     * Get operador
     *
     * @return string 
     */
    public function getOperador()
    {
        return $this->operador;
    }

    /**
     * Set valorBooleano
     *
     * @param boolean $valorBooleano
     * @return Facto
     */
    public function setValorBooleano($valorBooleano)
    {
        $this->valorBooleano = $valorBooleano;

        return $this;
    }

    /**
     * Get valorBooleano
     *
     * @return boolean 
     */
    public function getValorBooleano()
    {
        return $this->valorBooleano;
    }

    /**
     * Set valorNumerico
     *
     * @param integer $valorNumerico
     * @return Facto
     */
    public function setValorNumerico($valorNumerico)
    {
        $this->valorNumerico = $valorNumerico;

        return $this;
    }

    /**
     * Get valorNumerico
     *
     * @return integer 
     */
    public function getValorNumerico()
    {
        return $this->valorNumerico;
    }

    /**
     * Set valorLiteral
     *
     * @param string $valorLiteral
     * @return Facto
     */
    public function setValorLiteral($valorLiteral)
    {
        $this->valorLiteral = $valorLiteral;

        return $this;
    }

    /**
     * Get valorLiteral
     *
     * @return string 
     */
    public function getValorLiteral()
    {
        return $this->valorLiteral;
    }

    /**
     * @ORM\OneToMany(targetEntity="RegraFacto", mappedBy="id_facto")
     */
    protected $regraFacto;

    /**
     * @return mixed
     */
    public function getRegraFacto()
    {
        return $this->regraFacto;
    }

    /**
     * @param mixed $regraFacto
     */
    public function setRegraFacto($regraFacto)
    {
        $this->regraFacto = $regraFacto;
    }
}
