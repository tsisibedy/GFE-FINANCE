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
use FOS\RestBundle\View\View;
use AppBundle\Entity\Employer;
use AppBundle\Entity\Information;

class InformationController extends FOSRestController
{

    /**
     * @Rest\View()
     * @Rest\Get("/plus/information")
     */
    public function plusEmployersAction(Request $request)
    {
        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->find($request->get('id'));

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

        $testExiste = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
            ->findOneByEmployerId($request->get('id'));

        $testExiste1 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
            ->findAll();

        $aEmployerListtTest = [];


        foreach ($testExiste1 as $testExiste){
            $aEmployerListtT [] = [
                'im' => $testExiste->getInformationIm(),
                'categorie' => $testExiste->getInformationCategorie(),
                'classe' => $testExiste->getInformationClasse(),
                'corp' => $testExiste->getInformationCorp(),
                'dateEffet' => $testExiste->getInformationDateEffet(),
                'echelon' => $testExiste->getInformationEchelon(),
                'emploiOccuper' => $testExiste->getInformationEmploiOccuper(),
                'fonction' => $testExiste->getInformationFonction(),
                'formation' => $testExiste->getInformationFormation(),
                'grade' => $testExiste->getInformationGrade(),
                'indice' => $testExiste->getInformationIndice(),
                'diplome' => $testExiste->getInformationQualiteDiplome(),
                'statut' => $testExiste->getInformationStatut(),
                'titreHonorifique' => $testExiste->getInformationTitreHonorifique(),
                'employerId' => $testExiste->getEmployerId(),
            ];
        }

        $aEmployerListtTest [] = [
            'id'=>$testExiste->getId(),
            'im' => $testExiste->getInformationIm(),
            'categorie' => $testExiste->getInformationCategorie(),
            'classe' => $testExiste->getInformationClasse(),
            'corp' => $testExiste->getInformationCorp(),
            'dateEffet' => $testExiste->getInformationDateEffet(),
            'echelon' => $testExiste->getInformationEchelon(),
            'emploiOccuper' => $testExiste->getInformationEmploiOccuper(),
            'fonction' => $testExiste->getInformationFonction(),
            'formation' => $testExiste->getInformationFormation(),
            'grade' => $testExiste->getInformationGrade(),
            'indice' => $testExiste->getInformationIndice(),
            'diplome' => $testExiste->getInformationQualiteDiplome(),
            'statut' => $testExiste->getInformationStatut(),
            'titreHonorifique' => $testExiste->getInformationTitreHonorifique(),
            'employerId' => $testExiste->getEmployerId(),
        ];

        $cout = count($testExiste1);
        for ($testIncriment = 0; $testIncriment < $cout; $testIncriment++) {
            if ($request->get('id') == $aEmployerListtT[$testIncriment]['employerId']) {
                $existe = 1;
                $view = $this->view()
                    ->setData(array('exist'=>$existe, 'employers' => $aEmployerList,'information' => $aEmployerListtTest))
                    ->setTemplate('AppBundle:Information:plusEmployers.html.twig');

                return $this->handleView($view);
            }
        }

        $view = $this->view()
            ->setData(array('employers' => $aEmployerList, 'information' => $aEmployerListtTest))
            ->setTemplate('AppBundle:Information:plusEmployers.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/create/information")
     */
    public function createOneInformationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $testExiste = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
            ->findAll();

        $aEmployerList = [];


        foreach ($testExiste as $information) {
            $aInformationList [] = [
                'im' => $information->getInformationIm(),
                'categorie' => $information->getInformationCategorie(),
                'classe' => $information->getInformationClasse(),
                'corp' => $information->getInformationCorp(),
                'dateEffet' => $information->getInformationDateEffet(),
                'echelon' => $information->getInformationEchelon(),
                'emploiOccuper' => $information->getInformationEmploiOccuper(),
                'fonction' => $information->getInformationFonction(),
                'formation' => $information->getInformationFormation(),
                'grade' => $information->getInformationGrade(),
                'indice' => $information->getInformationIndice(),
                'diplome' => $information->getInformationQualiteDiplome(),
                'statut' => $information->getInformationStatut(),
                'titreHonorifique' => $information->getInformationTitreHonorifique(),
                'employerId'=>$information->getEmployerId(),
            ];
        }
        $cout = count($testExiste);
        $php_errormsg = "";
        for ($testIncriment = 0; $testIncriment < $cout; $testIncriment++) {
            if ($request->get('employerId') == $aInformationList[$testIncriment]['employerId']) {
                $php_errormsg = "Employer a deja son information";
                $view = $this->view()
                    ->setData(array('msg' => $php_errormsg, 'employers' => $aEmployerList))
                    ->setTemplate('AppBundle:Employer:getEmployers.html.twig');

                return $this->handleView($view);
            }
        }

        $info = new Information();

        $form = $this->createForm(InformationType::class, $info);
        $form->submit($request->request->all());

        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($info);
        $oManager->flush();

        return $this->redirect($this->generateUrl('show_all_employers'));
    }

    /**
     * @Rest\View()
     * @Rest\Get("/pre/update/information")
     */
    public function preUpdateInformationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $information = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
            ->find($request->get('idInformation'));
       
        $aInformationList [] = [
            'id'=>$information->getId(),
            'im' => $information->getInformationIm(),
            'categorie' => $information->getInformationCategorie(),
            'classe' => $information->getInformationClasse(),
            'corp' => $information->getInformationCorp(),
            'dateEffet' => $information->getInformationDateEffet(),
            'echelon' => $information->getInformationEchelon(),
            'emploiOccuper' => $information->getInformationEmploiOccuper(),
            'fonction' => $information->getInformationFonction(),
            'formation' => $information->getInformationFormation(),
            'grade' => $information->getInformationGrade(),
            'indice' => $information->getInformationIndice(),
            'diplome' => $information->getInformationQualiteDiplome(),
            'statut' => $information->getInformationStatut(),
            'titreHonorifique' => $information->getInformationTitreHonorifique(),
            'employerId'=>$information->getEmployerId(),
        ];

        $oEmployer = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->find($request->get('idEmployer'));

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
        
       
        $view = $this->view()
                        ->setData(array('employers'=>$aEmployerList,'information' => $aInformationList))
                        ->setTemplate('AppBundle:Information:preUpdateInformation.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/update/information/")
     */
    public function updateInformationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $information = $this
            ->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Information')
            ->find($request->request->get('id'));

        if (empty($information)) {
            return new JsonResponse(['Message' => 'Employer not found'], Response::HTTP_NOT_FOUND);
        }

        $form = $this->createForm(InformationType::class, $information);
        $form->submit($request->request->all());

        $Manager = $this->getDoctrine()->getManager();
        $Manager->merge($information);
        $Manager->flush();

        return $this->redirect($this->generateUrl('show_all_employers'));
    }
}
