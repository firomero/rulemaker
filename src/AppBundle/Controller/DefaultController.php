<?php

namespace AppBundle\Controller;

use AppBundle\Agent\Agent;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Twig\Extension\HttpFoundationExtension;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\HttpKernel;

class DefaultController extends Controller
{
   use Agent;
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->get('doctrine')->getManager();
        /**
         * @var EntityManager $em
         */
     try{
         $output = $this->SampleOuput("sbce",$em);
         return new JsonResponse($output);
     }catch (NoResultException $nr){
         return new JsonResponse(array($nr->getMessage()),JsonResponse::HTTP_NOT_FOUND);
     }
        catch (\Exception $e){
            return new JsonResponse(array($e->getMessage()),JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
