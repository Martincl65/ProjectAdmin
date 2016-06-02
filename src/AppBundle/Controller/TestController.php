<?php

namespace AppBundle\Controller;

use AppBundle\Form\TestType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Test;

class TestController extends Controller
{
    /**
     * @Route("/test/", name="test")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tests = $em->getRepository('AppBundle:Test')->findAll();
        return $this->render('test/index.html.twig', array('tests' => $tests));
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/test/create", name="create_test")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $test = new Test();
        $form = $this->createForm(TestType::class, $test);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($test);
            $em->flush();

            return $this->redirectToRoute('test');
        }

        return $this->render('test/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     * @Route("/test/update/{id}", name="update_test")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository('AppBundle:Test')->find($id);

        $form = $this->createForm(TestType::class, $test);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($test);
            $em->flush();

            return $this->redirectToRoute('test');
        }

        return $this->render('test/update.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @Route("/test/delete/{id}", name="delete_test")
     * @return Response
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $test = $em->getRepository('AppBundle:Test')->find($id);
        $em->remove($test);
        $em->flush();
        return $this->redirectToRoute('test');
    }
}
