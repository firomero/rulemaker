<?php

namespace AppBundle\Controller;

use AppBundle\Agent\Agent;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
   use Agent;
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine')->getManager();
        /**
         * @var EntityManager $em
         */
        $output = $this->SampleOuput("sbce",$em);
        return new JsonResponse($output);
    }
}
