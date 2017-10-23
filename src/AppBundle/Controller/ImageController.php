<?php

namespace AppBundle\Controller;

use AppBundle\Form\InformationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Form\EmployerType;
use AppBundle\Form\ImageType;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Image;


class ImageController extends FOSRestController
{
    
    /**
     * @Rest\View()
     * @Rest\Get("/image")
     */
    public function imageAction(Request $request)
    {
        
    }
    
    /**
     * @Rest\View()
     * @Rest\Post("/image/create")
     */
    public function imageCreateAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
       
        $image = new Image();
        $image->setDevisFile($request->files->get('file'));
        $image->setEmployerId($request->request->get('employerId'));
        $em = $this->getDoctrine()->getManager();
        $em->persist($image);
        $em->flush();

        return $this->redirect($this->generateUrl('plus_employers',array('id'=>$request->request->get('employerId'))));
    }

    
}
