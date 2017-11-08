<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publication;
use AppBundle\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("/accueil")
     */
    public function showAccueilAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $listPublication = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Publication')
            ->findAll();

        $listPublic = [];
        foreach ($listPublication as $public) {
            $listPublic [] = [
                'id' => $public->getId(),
                'publication' => $public->getPublicationContenu(),
                'date' => $public->getPublicationDate(),
            ];
        }

        $view = $this->view()
            ->setData(array('publier' => $listPublic))
            ->setTemplate('AppBundle:Default:showAccueil.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/publier")
     */
    public function PublierAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }


        $publication = new Publication();
        $publication->setPublicationDate(date_format(new \DateTime(),'m/d/Y'));
        $publication->setPublicationContenu($request->request->get('publicationContenu'));

        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($publication);
        $oManager->flush();

        return $this->redirect($this->generateUrl('show_accueil'));
    }


}
