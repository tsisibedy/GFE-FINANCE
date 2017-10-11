<?php

namespace AppBundle\Controller;

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

class EmployerController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Post("/all/search/employers")
     */
    public function searchAllEmployersAction(Request $request)
    {
        $test = $request->get('search');
        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAllEmployers($request->get('search'));

        $aEmployerList = [];

        foreach ($oEmployer as $toEmployer) {
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

        $view = $this->view($aEmployerList)
            ->setTemplateVar('employers')
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/rich/search/employers")
     */
    public function richAllEmployersAction(Request $request)
    {
        $ordre = $request->get('employerOrdre');
        $search = $request->get('search');


        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAllEmployers($search);

        if ($ordre == "ASC")
            asort($oEmployer);
        if ($ordre == "DESC")
            arsort($oEmployer);

        $aEmployerList = [];

        foreach ($oEmployer as $toEmployer) {
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

        $view = $this->view($aEmployerList)
            ->setTemplateVar('employers')
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Get("/all/show/employers")
     */
    public function showAllEmployersAction(Request $request)
    {
        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAll();

        $aEmployerList = [];

        foreach ($oEmployer as $toEmployer) {
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

        $view = $this->view($aEmployerList)
            ->setTemplateVar('employers')
            ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/show/employer/")
     */
    public function showOneEmployerAction(Request $request)
    {
        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
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
     * @Rest\Get("/pre/create/employer")
     */
    public function preCreateEmployerAction(Request $request)
    {

    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/create/employers")
     */
    public function createOneEmployerAction(Request $request)
    {
        $employer = new Employer();

        $form = $this->createForm(EmployerType::class, $employer);
        $form->submit($request->request->all());

        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($employer);
        $oManager->flush();

        return $this->redirect($this->generateUrl('show_all_employers'));
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Get("/one/remove/employer/{id}")
     */
    public function removeOneUserAction(Request $request)
    {
        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->find($request->get('id'));

        if (empty($oEmployer)) {
            return new JsonResponse(['Message' => 'Employer not found'], Response::HTTP_NOT_FOUND);
        }

        if ($oEmployer) {
            $oManager = $this->getDoctrine()->getManager();
            $oManager->remove($oEmployer);
            $oManager->flush();

            return $this->redirect($this->generateUrl('show_all_employers'));
        }
    }

    /**
     * @Rest\View()
     * @Rest\Get("/pre/update/employer/")
     */
    public function preUpdateEmployerAction(Request $request)
    {
        $aModif = $request->query->all();

        return $aModif;

    }


    /**
     * @Rest\View()
     * @Rest\Post("/update/employer/{id}")
     */
    public function updateEmployerAction(Request $request)
    {
        $oEmployer = $this
            ->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Employer')
            ->find($request->get('id'));

        if (empty($oEmployer)) {
            return new JsonResponse(['Message' => 'Employer not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(EmployerType::class, $oEmployer);
        $form->submit($request->request->all());

        $Manager = $this->getDoctrine()->getManager();
        $Manager->merge($oEmployer);
        $Manager->flush();

        return $this->redirect($this->generateUrl('show_all_employers'));
    }

    private function arrayOrderBy(&$_toDatas, $_toSortingSettings)
    {
        $toSortingFuncArgs = [];
        foreach ($_toSortingSettings as $zSortingField => $zSortingDirection) {
            $toTmp = [];
            foreach ($_toDatas as $zKey => $oData) {
                $toTmp[$zKey] = $oData[$zSortingField];
            }
            $toSortingFuncArgs[] = $toTmp;
            $toSortingFuncArgs[] = $zSortingDirection;
            $toSortingFuncArgs[] = SORT_STRING;
        }
        $toSortingFuncArgs[] = &$_toDatas;
        call_user_func_array('\array_multisort', $toSortingFuncArgs);

        return array_pop($toSortingFuncArgs);
    }

}
