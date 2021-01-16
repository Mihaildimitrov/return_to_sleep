<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Services;

class HomeController extends AbstractController
{
    /**
    * @Route("/")
    */
    public function Home()
    {
        $em = $this->getDoctrine()->getManager();

        $service = $em->getRepository(Services::class)->findAll();

        return new JsonResponse(['service'=>$service[0]->getName()]);
    }
}