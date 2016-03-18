<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base_Conocimiento
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Base_ConocimientoRepository")
 */
class Base_Conocimiento
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
     * @ORM\Column(name="problema", type="string", length=255)
     */
    private $problema;


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
     * Set problema
     *
     * @param string $problema
     * @return Base_Conocimiento
     */
    public function setProblema($problema)
    {
        $this->problema = $problema;

        return $this;
    }

    /**
     * Get problema
     *
     * @return string 
     */
    public function getProblema()
    {
        return $this->problema;
    }
}
