<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Language;
use AppBundle\Entity\Level;
use AppBundle\Form\LanguageType;
use AppBundle\Form\LevelType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LevelController extends Controller
{
    /**
     * @Route("/level/", name="level")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $levels = $em->getRepository('AppBundle:Level')->findAll();
        return $this->render('level/index.html.twig', array('levels' => $levels));
        
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/level/create", name="create_level")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $level = new Level();
        $form = $this->createForm(LevelType::class, $level);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($level);
            $em->flush();

            return $this->redirectToRoute('level');
        }

        return $this->render('level/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     * @Route("/level/update/{id}", name="update_level")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $level = $em->getRepository('AppBundle:Level')->find($id);

        $form = $this->createForm(LevelType::class, $level);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($level);
            $em->flush();

            return $this->redirectToRoute('level');
        }

        return $this->render('level/update.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @Route("/level/delete/{id}", name="delete_level")
     * @return Response
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $level = $em->getRepository('AppBundle:Level')->find($id);
        $em->remove($level);
        $em->flush();
        return $this->redirectToRoute('level');
    }
}