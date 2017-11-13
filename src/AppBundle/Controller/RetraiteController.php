<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Maintient;
use AppBundle\Entity\Retraite;
use AppBundle\Entity\Titularisation;
use AppBundle\Form\InformationType;
use AppBundle\Form\RetraiteType;
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

class RetraiteController extends FOSRestController
{

    /**
     * @Rest\View()
     * @Rest\Get("/retraite")
     */
    public function retraiteAction(Request $request)
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

        $listRetraite = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Retraite')
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
        $retraiteList = [];
        foreach ($listRetraite as $retraite) {
            $retraiteList [] = [
                'id' => $retraite->getId(),
                'employerId' => $retraite->getEmployerId(),
                'chapitre' => $retraite->getRetraiteChapitre(),
                'derniereSituation' => $retraite->getRetraiteDerniereSituation(),
                'casParticulier' => $retraite->getRetraiteCasParticulier(),
                'status' => $retraite->getRetraiteStatus(),
                'dateDebut' => $retraite->getRetraiteDateDebut(),
            ];
        }

        $view = $this->view()
            ->setData(array('employers' => $aEmployerList, 'retraiteList' => $retraiteList))
            ->setTemplate('AppBundle:Retraite:retraite.html.twig');

        return $this->handleView($view);
    }


    /**
     * @Rest\View()
     * @Rest\Post("/debut/retraite")
     */
    public function debutRetraiteAction(Request $request)
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
            ->setData(array('retraite' => 1, 'employers' => $aEmployerList, 'information' => $aInformationList))
            ->setTemplate('AppBundle:Retraite:retraite.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/one/create/retraite")
     */
    public function createOneRetraiteAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $retraite = new Retraite();
        $status = 0;

        $form = $this->createForm(RetraiteType::class, $retraite);
        $form->submit($request->request->all());
        $retraite->setRetraiteStatus($status);
        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($retraite);
        $oManager->flush();

        return $this->redirect($this->generateUrl('retraite'));
    }

    /**
     * @Rest\View()
     * @Rest\Get("/statusRetraite")
     */
    public function statusRetraiteAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Retraite')
            ->updateStatus($request->get('status'),$request->get('idUser'),$request->get('id'));

        return $this->redirect($this->generateUrl('retraite'));
    }

}
