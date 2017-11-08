<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Maintient;
use AppBundle\Entity\Titularisation;
use AppBundle\Form\InformationType;
use AppBundle\Form\TitularisationType;
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

class TitularisationController extends FOSRestController
{

    /**
     * @Rest\View()
     * @Rest\Get("/titularisation")
     */
    public function titularisationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

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
            ->getRepository('AppBundle:Titularisation')
            ->findAll();
        $aEmployerList = [];
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
        $titularisationList = [];
        foreach ($listMaintient as $titularisation) {
            $titularisationList [] = [
                'id' => $titularisation->getId(),
                'employerId' => $titularisation->getEmployerId(),
                'postCadre' => $titularisation->getTitularisationPostCadre(),
                'corp' => $titularisation->getTitularisationCorp(),
                'status' => $titularisation->getTitularisationStatus(),
                'lieu' => $titularisation->getTitularisationLieu(),
                'dateDebut' => $titularisation->getTitularisationDateDebut(),
                'dateFin' => $titularisation->getTitularisationDateFin(),
            ];
        }

        $view = $this->view()
            ->setData(array('employers' => $aEmployerList, 'titularisationList' => $titularisationList))
            ->setTemplate('AppBundle:Titularisation:titularisation.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/debut/titularisation")
     */
    public function debutTitularisationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

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
            ->setData(array('titularisation' => 1, 'employers' => $aEmployerList, 'information' => $aInformationList))
            ->setTemplate('AppBundle:Titularisation:titularisation.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/create/titularisation")
     */
    public function createOneTitularisationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $titularisation = new Titularisation();
        $status = 0;

        $form = $this->createForm(TitularisationType::class, $titularisation);
        $form->submit($request->request->all());
        $titularisation->setTitularisationStatus($status);
        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($titularisation);
        $oManager->flush();

        return $this->redirect($this->generateUrl('titularisation'));
    }

    /**
     * @Rest\View()
     * @Rest\Get("/statusTitularisation")
     */
    public function statusTitularisationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Titularisation')
            ->updateStatus($request->get('status'),$request->get('idUser'),$request->get('id'));

        return $this->redirect($this->generateUrl('titularisation'));
    }

}
