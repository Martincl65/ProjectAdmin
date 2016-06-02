<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Language;
use AppBundle\Form\LanguageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LanguageController extends Controller
{
    /**
     * @Route("/language/", name="language")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $languages = $em->getRepository('AppBundle:Language')->findAll();
        return $this->render('language/index.html.twig', array('languages' => $languages));
        
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/language/create", name="create_language")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $language = new Language();
        $form = $this->createForm(LanguageType::class, $language);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('language');
        }

        return $this->render('language/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     * @Route("/language/update/{id}", name="update_language")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $language = $em->getRepository('AppBundle:Language')->find($id);

        $form = $this->createForm(LanguageType::class, $language);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('language');
        }

        return $this->render('language/update.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @Route("/language/delete/{id}", name="delete_language")
     * @return Response
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $language = $em->getRepository('AppBundle:Language')->find($id);
        $em->remove($language);
        $em->flush();
        return $this->redirectToRoute('language');
    }
}