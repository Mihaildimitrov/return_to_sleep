<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;

class HomeController extends AbstractController
{

     /**
      * @Route("/", name="_home")
      */
      public function Home(Request $request)
      {
        
        $url = $request->get('url', null);

        if(!$url || !is_string($url) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)){
          return new JsonResponse(['response' => null, 'error'=> 'URL not valid']);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $em = $this->getDoctrine()->getManager();
        //$portfolio = $em->getRepository(PortfolioSettings::class)->findAll();

        
        return new JsonResponse(['response'=>'HTTP code: ' . $httpcode, 'error'=> null]);
      }

       /**
      * @Route("/register", name="_register")
      */
      public function Register(Request $request)
      {
        
        $url = $request->get('url', null);

        if(!$url || !is_string($url) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)){
          return new JsonResponse(['response' => null, 'error'=> 'URL not valid']);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $em = $this->getDoctrine()->getManager();
        //$portfolio = $em->getRepository(PortfolioSettings::class)->findAll();

        
        return new JsonResponse(['response'=>'HTTP code: ' . $httpcode, 'error'=> null]);
      }


}