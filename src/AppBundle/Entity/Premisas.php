<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Premisas
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PremisasRepository")
 */
class Premisas
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
     * @ORM\Column(name="premisas", type="text")
     */
    private $premisas;


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
     * Set premisas
     *
     * @param string $premisas
     * @return Premisas
     */
    public function setPremisas($premisas)
    {
        $this->premisas = $premisas;

        return $this;
    }

    /**
     * Get premisas
     *
     * @return string 
     */
    public function getPremisas()
    {
        return $this->premisas;
    }
}
