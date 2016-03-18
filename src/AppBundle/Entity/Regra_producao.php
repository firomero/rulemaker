<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regra_producao
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Regra_producaoRepository")
 */
class Regra_producao
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
     * @ORM\Column(name="nivel", type="integer")
     */
    private $nivel;


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
     * Set nivel
     *
     * @param integer $nivel
     * @return Regra_producao
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return integer 
     */
    public function getNivel()
    {
        return $this->nivel;
    }


    /**
     * @var Facto
     *
     * @ORM\ManyToOne(targetEntity="Facto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="facto", referencedColumnName="id")
     * })
     */
    protected $nodoPremisa;

    /**
     * @return Facto
     */
    public function getNodoPremisa()
    {
        return $this->nodoPremisa;
    }

    /**
     * @param Facto $nodoPremisa
     */
    public function setNodoPremisa($nodoPremisa)
    {
        $this->nodoPremisa = $nodoPremisa;
    }

    /**
     * @return Facto
     */
    public function getNodoConclusion()
    {
        return $this->nodoConclusion;
    }

    /**
     * @param Facto $nodoConclusion
     */
    public function setNodoConclusion($nodoConclusion)
    {
        $this->nodoConclusion = $nodoConclusion;
    }


    /**
     * @var Facto
     *
     * @ORM\ManyToOne(targetEntity="Facto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="facto", referencedColumnName="id")
     * })
     */
    protected $nodoConclusion;

    /**
     * @var Premisas
     *
     * @ORM\ManyToOne(targetEntity="Premisas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="premisa", referencedColumnName="id")
     * })
     */
    protected $conectorPremisa;

    /**
     * @return Premisas
     */
    public function getConectorPremisa()
    {
        return $this->conectorPremisa;
    }

    /**
     * @param Premisas $conectorPremisa
     */
    public function setConectorPremisa($conectorPremisa)
    {
        $this->conectorPremisa = $conectorPremisa;
    }

    /**
     * @return Premisas
     */
    public function getConectorConclusion()
    {
        return $this->conectorConclusion;
    }

    /**
     * @param Premisas $conectorConclusion
     */
    public function setConectorConclusion($conectorConclusion)
    {
        $this->conectorConclusion = $conectorConclusion;
    }

    /**
     * @var Premisas
     *
     * @ORM\ManyToOne(targetEntity="Premisas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="premisa", referencedColumnName="id")
     * })
     */
    protected $conectorConclusion;
}
