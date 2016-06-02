<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Language;
use AppBundle\Entity\Level;
use AppBundle\Entity\Exercise;
use AppBundle\Form\LanguageType;
use AppBundle\Form\LevelType;
use AppBundle\Form\ExerciseType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExerciseController extends Controller
{
    /**
     * @Route("/exercise/", name="exercise")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $exercises = $em->getRepository('AppBundle:Exercise')->findAll();
        return $this->render('exercise/index.html.twig', array('exercises' => $exercises));
        
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/exercise/create", name="create_exercise")
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $exercise = new Exercise();
        $form = $this->createForm(ExerciseType::class, $exercise);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($exercise);
            $em->flush();

            return $this->redirectToRoute('exercise');
        }

        return $this->render('exercise/create.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @return Response
     * @Route("/exercise/update/{id}", name="update_exercise")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $exercise = $em->getRepository('AppBundle:Exercise')->find($id);

        $form = $this->createForm(ExerciseType::class, $exercise);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($exercise);
            $em->flush();

            return $this->redirectToRoute('exercise');
        }

        return $this->render('exercise/update.html.twig', array('form' => $form->createView()));
    }

    /**
     * @param integer $id
     * @param Request $request
     * @Route("/exercise/delete/{id}", name="delete_exercise")
     * @return Response
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $exercise = $em->getRepository('AppBundle:Exercise')->find($id);
        $em->remove($exercise);
        $em->flush();
        return $this->redirectToRoute('exercise');
    }
}