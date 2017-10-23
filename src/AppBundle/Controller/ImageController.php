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
use AppBundle\Entity\Employer;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;


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

        return $this->redirect($this->generateUrl('plus_employers', array('id' => $request->request->get('employerId'))));
    }


    /**
     * @Rest\View()
     * @Rest\Get("/Exel/create")
     */
    public function ExelAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAll();

        $listIntegration = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Integration')
            ->findAll();


        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAll();

        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A1', 'id');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B1', 'Nom');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C1', 'Prenom');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D1', 'Date de naissance');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E1', 'CIN');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F1', 'Lieu de naissance');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G1', 'Situation matrimoniale');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H1', 'Sexe');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('I1', 'Addresse');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('J1', 'Contact');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('K1', 'Corp');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('L1', 'Post Cadre');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('M1', 'Date d\'ntegration');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('N1', 'Lieu d\'integration');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('O1', 'Cas Particulier');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('P1', 'Date Arret');

        $aEmployerList = [];
        $count = 2;
        foreach ($listIntegration as $integration) {
            foreach ($oEmployers as $oEmployer) {
                if ($oEmployer->getId() == $integration->getEmployerId()) {

                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A' . $count, $oEmployer->getId());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B' . $count, $oEmployer->getEmployerNom());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C' . $count, $oEmployer->getEmployerPrenom());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D' . $count, $oEmployer->getEmployerDateNaissance());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E' . $count, $oEmployer->getEmployerCin());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F' . $count, $oEmployer->getEmployerLieuNaissance());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G' . $count, $oEmployer->getEmployerSituation());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H' . $count, $oEmployer->getEmployerSexe());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('I' . $count, $oEmployer->getEmployerAddresse());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('J' . $count, $integration->getIntegrationContact());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('K' . $count, $integration->getIntegrationCorp());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('L' . $count, $integration->getIntegrationPostCadre());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('M' . $count, $integration->getIntegrationDateIntegration());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('N' . $count, $integration->getIntegrationLieuIntegration());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('O' . $count, $integration->getIntegrationCasParticulier());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('P' . $count, $integration->getIntegrationDateArretIntegration());
                    $count++;
                }
            }
        }

        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        $phpExcelObject->setActiveSheetIndex(0);
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $response = $this->get('phpexcel')->createStreamedResponse($writer);

        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'liste-integration-personnel.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }


    /**
     * @Rest\View()
     * @Rest\Get("/Exel/createMaintient")
     */
    public function ExelMaintientAction(Request $request)
    {
        if (!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }

        $oEmployers = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Employer')
            ->findAll();

        $listMaintient = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Maintient')
            ->findAll();


        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A1', 'id');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B1', 'Nom');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C1', 'Prenom');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D1', 'Date de naissance');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E1', 'CIN');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F1', 'Lieu de naissance');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G1', 'Situation matrimoniale');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H1', 'Sexe');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('I1', 'Addresse');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('J1', 'Corps');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('K1', 'Derniere situation');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('L1', 'Date de debut');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('M1', 'Durer du maintient');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('N1', 'Date fin');
        $phpExcelObject->setActiveSheetIndex(0)->setCellValue('O1', 'Status');


        $count = 2;
        foreach ($listMaintient as $maintient) {
            foreach ($oEmployers as $oEmployer) {
                if ($oEmployer->getId() == $maintient->getEmployerId()) {

                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('A' . $count, $oEmployer->getId());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('B' . $count, $oEmployer->getEmployerNom());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('C' . $count, $oEmployer->getEmployerPrenom());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('D' . $count, $oEmployer->getEmployerDateNaissance());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('E' . $count, $oEmployer->getEmployerCin());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('F' . $count, $oEmployer->getEmployerLieuNaissance());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('G' . $count, $oEmployer->getEmployerSituation());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('H' . $count, $oEmployer->getEmployerSexe());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('I' . $count, $oEmployer->getEmployerAddresse());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('J' . $count, $maintient->getMaintientCorp());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('K' . $count, $maintient->getMaintientDeniereSituation());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('L' . $count, $maintient->getMaintientDateDebut());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('M' . $count, $maintient->getMaintientDurer());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('N' . $count, $maintient->getMaintientDateFin());
                    $phpExcelObject->setActiveSheetIndex(0)->setCellValue('O' . $count, $maintient->getMaintientStatus());
                    $count++;
                }
            }
        }

        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        $phpExcelObject->setActiveSheetIndex(0);
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        $response = $this->get('phpexcel')->createStreamedResponse($writer);

        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'liste-maintient-personnel.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }
}
