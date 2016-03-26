<?php
/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 2:39 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Conector
 *
 * @ORM\Table()
 * @ORM\Entity()
 */
class Conector
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
     * Conector constructor.
     */
    public function __construct()
    {
        $this->regraConector = new ArrayCollection();
    }

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
    public function getSignal()
    {
        return $this->signal;
    }

    /**
     * @param string $signal
     */
    public function setSignal($signal)
    {
        $this->signal = $signal;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="`signal`", type="string", length=255)
     */
    private $signal;

    /**
     * @ORM\OneToMany(targetEntity="RegraConector", mappedBy="id_conector")
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