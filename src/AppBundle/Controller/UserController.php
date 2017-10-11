<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest; // alias pour toutes les annotations
use FOS\RestBundle\View\ViewHandler;
use FOS\RestBundle\View\View;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/users")
     */
    public function getUsersAction(Request $request)
    {
        $oUser = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findAll();

        $aUserList = [];

        foreach ($oUser as $toUser) {
            $aUserList [] = [
                'id' => $toUser->getId(),
                'firstname' => $toUser->getFirstname(),
                'lastname' => $toUser->getLastname(),
                'email' => $toUser->getEmail(),
            ];
        }

        return $aUserList;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/user/{id}")
     */
    public function getUserAction($id, Request $request)
    {
        $oUser = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->find($id);

        if (empty($oUser)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        $aUserList [] = [
            'id' => $oUser->getId(),
            'firstname' => $oUser->getFirstname(),
            'lastname' => $oUser->getLastname(),
            'email' => $oUser->getEmail(),
        ];

        return $aUserList;
    }

    /**
     * @Rest\View()
     * @Rest\Post("/users")
     */
    public function postUsersAction(Request $request)
    {
        $user = new User();
        $user->setFirstname($request->get('firstname'));
        $user->setLastname($request->get('lastname'));
        $user->setEmail($request->get('email'));

        $oManager = $this->getDoctrine()->getManager();
        $oManager->persist($user);
        $oManager->flush();

        return $user;
    }
}
