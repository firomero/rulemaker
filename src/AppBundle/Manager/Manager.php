<?php
namespace AppBundle\Manager;

/**
 * Created by PhpStorm.
 * User: felito
 * Date: 3/22/2016
 * Time: 2:29 PM
 */
 abstract class Manager
{
    protected $entityManager;

    /**
     * RegraManager constructor.
     * @param $entityManager
     */
    public function __construct(\Doctrine\ORM\EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}