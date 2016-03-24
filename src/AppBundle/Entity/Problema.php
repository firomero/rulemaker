<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 11:30 AM
 */

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

use Doctrine\ORM\Mapping as ORM;


/**
 * Problema
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ProblemaRepository")
 */
class Problema
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity="Regra_producao", mappedBy="problema")
     */
    private $regras;

    /**
     * @return mixed
     */
    public function getRegras()
    {
        return $this->regras;
    }

    /**
     * @param mixed $regras
     */
    public function setRegras($regras)
    {
        $this->regras = $regras;
    }

    public function __construct() {
        $this->regras = new ArrayCollection();
    }



}