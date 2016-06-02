<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Developer;
use AppBundle\Form\DeveloperType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeveloperController extends Controller
{
    /**
     * @Route("/developer/", name="developer")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $developers = $em->getRepository('AppBundle:Developer')->findAll();
        return $this->render('developer/index.html.twig', array('developers' => $developers));
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/developer/create", name="create_developer")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $developer = new Developer();
        $form = $this->createForm(DeveloperType::class, $developer);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($developer);
            $em->flush();

            return $this->redirectToRoute('developer');
        }

        return $this->render('developer/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     * @Route("/developer/update/{id}", name="update_developer")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $developer = $em->getRepository('AppBundle:Developer')->find($id);

        $form = $this->createForm(DeveloperType::class, $developer);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($developer);
            $em->flush();

            return $this->redirectToRoute('developer');
        }

        return $this->render('developer/update.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @Route("/developer/delete/{id}", name="delete_developer")
     * @return Response
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $developer = $em->getRepository('AppBundle:Developer')->find($id);
        $em->remove($developer);
        $em->flush();
        return $this->redirectToRoute('developer');
    }
}