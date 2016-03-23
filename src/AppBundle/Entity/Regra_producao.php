<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Regra_producao
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Regra_producaoRepository")
 * @UniqueEntity("nombre")
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
     * Regra_producao constructor.
     */
    public function __construct()
    {
        $this->regraConector = new ArrayCollection();
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

    /**
     * @ORM\ManyToOne(targetEntity="Problema", inversedBy="regras")
     * @ORM\JoinColumn(name="id_problema", referencedColumnName="id")
     */
    protected $problema;

    /**
     * @return Problema
     */
    public function getProblema()
    {
        return $this->problema;
    }

    /**
     * @param Problema $problema
     */
    public function setProblema(Problema $problema)
    {
        $this->problema = $problema;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    protected $nombre;

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @ORM\OneToMany(targetEntity="RegraConector", mappedBy="id_regra")
     */
    protected $regraConector;

    /**
     * @return mixed
     */
    public function getRegraConector()
    {
        return $this->regraConector;
    }

    /**
     * @param mixed $regraConector
     */
    public function setRegraConector($regraConector)
    {
        $this->regraConector = $regraConector;
    }

}