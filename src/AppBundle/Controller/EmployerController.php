<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Form\EmployerType;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Employer;
use AppBundle\Entity\Information;

class EmployerController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Post("/all/search/employers")
     * @Rest\Get("/all/search/employers")
     */
    public function searchAllEmployersAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $test = $request->get('search');
        $pageNum = $request->get('pageNum');
        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findAllEmployers($request->get('search'));

        $coutEmployer = count($oEmployer);
        $pageLimiteContent = $this->getParameter('page_sige');

        if (isset($pageNum)) {

        } else {
            $pageNum = 1;
        }

        $reference = $pageLimiteContent * $pageNum;

        //Definition du debut du page et la fin du page
        $pageElementDebut = $reference - $pageLimiteContent;
        $pageElementFin = $reference - 1;

        //calcul nombre de page
        $nombrePage = 1;
        $clonePageLimit = $pageLimiteContent;
        for ($a = 0; $a <= $coutEmployer; $a++) {
            if ($clonePageLimit < $a) {
                $clonePageLimit += $pageLimiteContent;
                $nombrePage++;
            }
        }

        //recuperation du page
        $aNombrePage = [];
        for ($i = 1; $i <= $nombrePage; $i++) {
            $aNombrePage[] = $i;
        }

        $aEmployerList = [];
        $iIncrimentation = 0;
        foreach ($oEmployer as $toEmployer) {

            if ($pageElementDebut <= $iIncrimentation and $iIncrimentation <= $pageElementFin) {
                $aEmployerList [] = [
                    'id' => $toEmployer->getId(),
                    'nom' => $toEmployer->getEmployerNom(),
                    'prenom' => $toEmployer->getEmployerPrenom(),
                    'dateNaissance' => $toEmployer->getEmployerDateNaissance(),

                    'cin' => $toEmployer->getEmployerCin(),
                    'lieuNaissance' => $toEmployer->getEmployerLieuNaissance(),
                    'situation' => $toEmployer->getEmployerSituation(),
                    'sexe' => $toEmployer->getEmployerSexe(),
                    'addresse' => $toEmployer->getEmployerAddresse(),
                ];
            }
            $iIncrimentation++;
        }

        $view = $this->view()
            ->setData(array('count' => 'search_all_employers', 'search' => $test, 'employers' => $aEmployerList, 'page' => $aNombrePage))
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/rich/search/employers")
     * @Rest\Get("/rich/search/employers")
     *
     */
    public function richAllEmployersAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }


        $ordre = $request->get('employerOrdre');
        $search = $request->get('search');
        $pageNum = $request->get('pageNum');

        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findAllEmployers($search);

        if ($ordre == "ASC")
            asort($oEmployer);
        if ($ordre == "DESC")
            arsort($oEmployer);


        $coutEmployer = count($oEmployer);
        $pageLimiteContent = $this->getParameter('page_sige');

        if (isset($pageNum)) {

        } else {
            $pageNum = 1;
        }

        $reference = $pageLimiteContent * $pageNum;

        //Definition du debut du page et la fin du page
        $pageElementDebut = $reference - $pageLimiteContent;
        $pageElementFin = $reference - 1;

        //calcul nombre de page
        $nombrePage = 1;
        $clonePageLimit = $pageLimiteContent;
        for ($a = 0; $a <= $coutEmployer; $a++) {
            if ($clonePageLimit < $a) {
                $clonePageLimit += $pageLimiteContent;
                $nombrePage++;
            }
        }

        //recuperation du page
        $aNombrePage = [];
        for ($i = 1; $i <= $nombrePage; $i++) {
            $aNombrePage[] = $i;
        }

        $aEmployerList = [];
        $iIncrimentation = 0;
        foreach ($oEmployer as $toEmployer) {

            if ($pageElementDebut <= $iIncrimentation and $iIncrimentation <= $pageElementFin) {
                $aEmployerList [] = [
                    'id' => $toEmployer->getId(),
                    'nom' => $toEmployer->getEmployerNom(),
                    'prenom' => $toEmployer->getEmployerPrenom(),
                    'dateNaissance' => $toEmployer->getEmployerDateNaissance(),

                    'cin' => $toEmployer->getEmployerCin(),
                    'lieuNaissance' => $toEmployer->getEmployerLieuNaissance(),
                    'situation' => $toEmployer->getEmployerSituation(),
                    'sexe' => $toEmployer->getEmployerSexe(),
                    'addresse' => $toEmployer->getEmployerAddresse(),
                ];
            }
            $iIncrimentation++;
        }

        $view = $this->view()
            ->setData(array('count' => 'rich_all_employers', 'search' => $search, 'ordre' => $ordre, 'employers' => $aEmployerList, 'page' => $aNombrePage))
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/all/show/employers")
     */
    public function showAllEmployersAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }


        $pageNum = $request->get('pageNum');

        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findAll();

        $coutEmployer = count($oEmployer);
        $pageLimiteContent = $this->getParameter('page_sige');

        if (isset($pageNum)) {

        } else {
            $pageNum = 1;
        }

        $reference = $pageLimiteContent * $pageNum;

        //Definition du debut du page et la fin du page
        $pageElementDebut = $reference - $pageLimiteContent;
        $pageElementFin = $reference - 1;

        //calcul nombre de page
        $nombrePage = 1;
        $clonePageLimit = $pageLimiteContent;
        for ($a = 0; $a <= $coutEmployer; $a++) {
            if ($clonePageLimit < $a) {
                $clonePageLimit += $pageLimiteContent;
                $nombrePage++;
            }
        }

        //recuperation du page
        $aNombrePage = [];
        for ($i = 1; $i <= $nombrePage; $i++) {
            $aNombrePage[] = $i;
        }
        
        $aEmployerList = [];
        $iIncrimentation = 0;
        foreach ($oEmployer as $toEmployer) {
            if ($pageElementDebut <= $iIncrimentation and $iIncrimentation <= $pageElementFin) {
                $aEmployerList [] = [
                    'id' => $toEmployer->getId(),
                    'nom' => $toEmployer->getEmployerNom(),
                    'prenom' => $toEmployer->getEmployerPrenom(),
                    'dateNaissance' => $toEmployer->getEmployerDateNaissance(),

                    'cin' => $toEmployer->getEmployerCin(),
                    'lieuNaissance' => $toEmployer->getEmployerLieuNaissance(),
                    'situation' => $toEmployer->getEmployerSituation(),
                    'sexe' => $toEmployer->getEmployerSexe(),
                    'addresse' => $toEmployer->getEmployerAddresse(),
                ];
            }
            $iIncrimentation++;
        }
        
        $image = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Image')
            ->findAll();
            
        $imageList =[];
        foreach ($image as $imageObjet) {
            $imageList [] = [
                'id' => $imageObjet->getId(),
                'imageIdEmployer' => $imageObjet->getEmployerId(),
                'imageName' => $imageObjet->getDevisName(),
            ];
        }

        $view = $this->view()
            ->setData(array('count' => 'show_all_employers', 'employers' => $aEmployerList, 'page' => $aNombrePage,'image'=>$imageList))
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/show/employer/")
     */
    public function showOneEmployerAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->find($request->get('id'));

        if (empty($oEmployer)) {
            return new JsonResponse(['Message' => 'Employer not found'], Response::HTTP_NOT_FOUND);
        }

        $aEmployerList [] = [
            'id' => $oEmployer->getId(),
            'nom' => $oEmployer->getEmployerNom(),
            'prenom' => $oEmployer->getEmployerPrenom(),
            'dateNaissance' => $oEmployer->getEmployerDateNaissance(),
            'cin' => $oEmployer->getEmployerCin(),
            'lieuNaissance' => $oEmployer->getEmployerLieuNaissance(),
            'situation' => $oEmployer->getEmployerSituation(),
            'sexe' => $oEmployer->getEmployerSexe(),
            'addresse' => $oEmployer->getEmployerAddresse(),
        ];

        $view = $this->view($aEmployerList)
            ->setTemplateVar('employers')
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/pre/update/employer/")
     */
    public function preUpdateEmployerAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $aModif = $request->query->all();

        return $aModif;

    }


    /**
     * @Rest\View()
     * @Rest\Post("/update/employer/{id}")
     */
    public function updateEmployerAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $oEmployer = $this
            ->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->find($request->get('id'));

        if (empty($oEmployer)) {
            return new JsonResponse(['Message' => 'Employer not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(UserType::class, $oEmployer);
        $form->submit($request->request->all());

        $Manager = $this->getDoctrine()->getManager();
        $Manager->merge($oEmployer);
        $Manager->flush();

        return $this->redirect($this->generateUrl('show_all_employers'));
    }


}
