<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends AbstractController
{
     /**
      * @Route("/", name="_home")
      */
      public function Home()
      {

        $em = $this->getDoctrine()->getManager();
        //$portfolio = $em->getRepository(PortfolioSettings::class)->findAll();

        
        return new JsonResponse(['response'=>'ok']);
      }

}