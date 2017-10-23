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
use AppBundle\Form\IntegrationType;
use FOS\RestBundle\View\View;
use AppBundle\Entity\Employer;
use AppBundle\Entity\Information;
use AppBundle\Entity\Integration;
use Symfony\Component\Validator\Constraints\DateTime;

class IntegrationController extends FOSRestController
{
    
    /**
     * @Rest\View()
     * @Rest\Get("/integration")
     */
    public function integrationAction(Request $request)
    {
        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAll();

        $testExisteInfo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Information')
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
        
        $listIntegration = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Integration')
            ->findAll();
            
        foreach ($listIntegration as $integration) {
            $integrationList [] = [
                'id' => $integration->getId(),
                'employerId' => $integration->getEmployerId(),
                'contact' => $integration->getIntegrationContact(),
                'corp' => $integration->getIntegrationCorp(),
                'postCadre' => $integration->getIntegrationPostCadre(),
                'dateIntegration' => $integration->getIntegrationDateIntegration(),
                'lieuIntegration' => $integration->getIntegrationLieuIntegration(),
                'casParticulier' => $integration->getIntegrationCasParticulier(),
                'dateArret' => $integration->getIntegrationDateArretIntegration(),
            ];
        }
        
        $view = $this->view()
            ->setData(array('employers' => $aEmployerList,'integrationList'=>$integrationList))
            ->setTemplate('AppBundle:Integration:integration.html.twig');

        return $this->handleView($view);
    }

    /**
     * @Rest\View()
     * @Rest\Post("/debut/integration")
     */
    public function debutIntegrationAction(Request $request)
    {
        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
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
            ->setData(array('integration' => 1, 'employers' => $aEmployerList, 'information' => $aInformationList))
            ->setTemplate('AppBundle:Integration:integration.html.twig');

        return $this->handleView($view);
    }
    
    /**
     * @Rest\View()
     * @Rest\Post("/one/create/integration")
     */
    public function createOneIntegrationAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        
        
        $integration = new Integration();

        $form = $this->createForm(IntegrationType::class, $integration);
        $form->submit($request->request->all());
         
        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($integration);
        $oManager->flush();
     
        return $this->redirect($this->generateUrl('integration'));
    }
    
    
}
