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
use App\Entity\ServiceStatus;

class ServiceController extends AbstractController
{

    /**
    * @Route("/service/check", name="_check", methods={"POST"})
    */
    public function Check(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository(Service::class)->findAll();

        $arr = array();

        foreach($services as $service)
        {
            $url = $service->getUrl();
            $date_created = new \DateTime();
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
            curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            if(curl_exec($ch))
            {
                $info = curl_getinfo($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                
                $serviceStatus = new ServiceStatus();
                $serviceStatus->addServiceId($service);
                $serviceStatus->setDateChecked($date_created);
                $serviceStatus->setHttpCode($httpcode);
                $serviceStatus->setRequestTimeout($info['total_time']);
                $serviceStatus->setRequestType('GET');

                $em->persist($serviceStatus);
                $em->flush();

                curl_close($ch);
                $arr[$service->getId()]['id'] = $service->getId();
                $arr[$service->getId()]['name'] = $service->getName();
                $arr[$service->getId()]['date_created'] = $service->getDateCreated();
                $arr[$service->getId()]['last_status_code'] = $httpcode;
                $arr[$service->getId()]['last_status_message'] = 'TODO';
                $arr[$service->getId()]['method'] = 'GET';
                $arr[$service->getId()]['has_ssl'] = $service->getHasSsl();
                $arr[$service->getId()]['success_percentage'] = "56";
                $arr[$service->getId()]['success_requests'] = "56";
                $arr[$service->getId()]['failed_requests'] = "0";
            }
            else
            {
                return new JsonResponse(['response' => null, 'error'=> 'cURL could not exec']);
            }
        }

        $json = json_encode(['services'=>$arr]);
        return new JsonResponse($json);
    }
    /**
     * @Route("/service/add", name="_add", methods={"POST"})
    */
    public function Add(Request $request)
    {
        $content = $request->getContent();
        $json = json_decode($content, true);

        $name = $json['name'];
        $url = $json['url'];

        if(!$url || !is_string($url) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $url)){
            return new JsonResponse(['response' => null, 'error'=> 'URL not valid']);
        }

        $date_created = new \DateTime();
        //$user = $this->getUser();
        
        //TODO CHECK IF USER RETURN AUTHENTICATED AND WRITE IFS REQ
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findAll()[0];

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

    /**
     * @Route("/service/delete", name="_delete", methods={"POST"})
    */
    public function Delete(Request $request)
    {
        $content = $request->getContent();
        $json = json_decode($content, true);

        $id = $json['id'];

        $date_deleted = new \DateTime();

        //$user = $this->getUser();
        
        //TODO CHECK IF USER RETURN AUTHENTICATED AND WRITE IFS REQ
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository(User::class)->findAll()[0];

        $service = $em->getRepository(Service::class)->findOneBy(['id'=>$id]);
   
        $service->setDateDeleted($date_deleted);
        $service->setDeletedBy($user);
        $service->setIsDeleted(1);
        //TODO HAS SSL
        $service->setHasSsl(0);

        $em->persist($service);
        $em->flush();

        return new JsonResponse(['response' => 'Service deleted successfully', 'error'=> null ]);
    }

}