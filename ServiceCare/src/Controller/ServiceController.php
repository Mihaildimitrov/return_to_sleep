<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\User;
use App\Entity\Service;

class ServiceController extends AbstractController
{

    /**
    * @Route("/service/check", name="_check", methods={"POST"})
    */
    public function Check(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();

        $url = $request->get('url', null);

        if(!$url || !is_string($url) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)){
          return new JsonResponse(['response' => null, 'error'=> 'URL not valid']);
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        if(curl_exec($ch))
        {
            $info = curl_getinfo($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            
            //$portfolio = $em->getRepository(PortfolioSettings::class)->findAll();
            curl_close($ch);
            return new JsonResponse(['response'=>'HTTP code: ' . $httpcode . ', ' . 'Took ' . $info['total_time'] . ' seconds to transfer a request to ' . $info['url'], 'error'=> null]);
        }
        else
        {
            return new JsonResponse(['response' => null, 'error'=> 'cURL could not exec']);
        }
        //$output = curl_exec($ch);
    }
    /**
     * @Route("/service/add", name="_check", methods={"POST"})
    */
    public function Add(Request $request)
    {
        $name = $request->get('name', null);
        $url = $request->get('url', null);
        $date_created = new \DateTime();
        $user = $this->getUser();
        
        //TODO CHECK IF USER RETURN AUTHENTICATED AND WRITE IFS REQ
        $em = $this->getDoctrine()->getManager();

        $service = new Service();

        $service->setName($name);
        $service->setUrl($url);
        $service->setDateCreated($date_created);
        $service->setDateDeleted(null);
        $service->setCreatedBy($user);
        $service->setDeletedBy(null);
        $service->setIsDeleted(0);
        //TODO HAS SSL
        $service->setHasSsl(0);

        $em->persist($service);
        $em->flush();

        return new JsonResponse(['response' => 'Service added successfully', 'error'=> null ]);
    }

}