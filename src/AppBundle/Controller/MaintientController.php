<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Maintient;
use AppBundle\Form\InformationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\Controller\FOSRestController;
use AppBundle\Form\EmployerType;
use AppBundle\Form\MaintientType;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Employer;
use AppBundle\Entity\Information;
use Symfony\Component\Validator\Constraints\DateTime;

class MaintientController extends FOSRestController
{

    /**
     * @Rest\View()
     * @Rest\Get("/maintient")
     */
    public function maintientAction(Request $request)
    {
        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findAll();

        $testExisteInfo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
            ->findAll();

        $listMaintient = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Maintient')
            ->findAll();

        foreach ($oEmployers as $oEmployer) {
            foreach ($testExisteInfo as $testExisteInf) {
                if ($oEmployer->getId() == $testExisteInf->getEmployerId()) {
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
                }
            }
        }
        $maintientList = [];
        foreach ($listMaintient as $maintient) {
            $maintientList [] = [
                'id' => $maintient->getId(),
                'employerId' => $maintient->getEmployerId(),
                'corp' => $maintient->getMaintientCorp(),
                'derniereSituation' => $maintient->getMaintientDeniereSituation(),
                'status' => $maintient->getMaintientStatus(),
                'dateDebut' => $maintient->getMaintientDateDebut(),
                'durer' => $maintient->getMaintientDurer(),
                'dateFin' => $maintient->getMaintientDateFin(),
            ];
        }

        $view = $this->view()
            ->setData(array('employers' => $aEmployerList, 'maintientList' => $maintientList))
            ->setTemplate('AppBundle:Maintient:maintient.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/debut/maintient")
     */
    public function debutMaintientAction(Request $request)
    {
        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findAll();

        $aEmployerList = [];
        foreach ($oEmployers as $oEmployer) {
            if ($request->request->get('id') == $oEmployer->getId()) {
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
            }
        }

        $testExiste1 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
            ->findAll();

        $aInformationList = [];
        foreach ($testExiste1 as $testExiste) {
            if ($request->request->get('id') == $testExiste->getEmployerId()) {
                $aInformationList [] = [
                    'id' => $testExiste->getId(),
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
        }


        $view = $this->view()
            ->setData(array('maintient' => 1, 'employers' => $aEmployerList, 'information' => $aInformationList))
            ->setTemplate('AppBundle:Maintient:maintient.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/create/maintient")
     */
    public function createOneMaintientAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $maintient = new Maintient();

        $form = $this->createForm(MaintientType::class, $maintient);
        $form->submit($request->request->all());

        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($maintient);
        $oManager->flush();

        return $this->redirect($this->generateUrl('maintient'));
    }


}
