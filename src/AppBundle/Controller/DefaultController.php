<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class DefaultController extends FOSRestController
{
    /**
     * @Rest\View()
     * @Rest\Get("/")
     */
    public function showAccueilAction(Request $request)
    {

    }

}
