<?php

namespace App\Controller;

use App\Entity\PersonageSpeech;
use App\Form\PersonageSpeechType;
use App\Repository\PersonageSpeechRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/personage-speech")
 */
class PersonageSpeechController extends AbstractController
{
    /**
     * @Route("/", name="personage_speech_index", methods={"GET"})
     */
    public function index(PersonageSpeechRepository $speechRepository): Response
    {
        return $this->render('personage_speech/index.html.twig', [
            'personage_speeches' => $speechRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="personage_speech_new", methods={"GET","POST"})
     * @Security("is_granted(constant('App\\Entity\\User::ROLE_FOR_EDITION'))")
     */
    public function new(Request $request): Response
    {
        $personageSpeech = new PersonageSpeech();
        $form = $this->createForm(PersonageSpeechType::class, $personageSpeech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personageSpeech);
            $entityManager->flush();

            return $this->redirectToRoute('personage_speech_index');
        }

        return $this->render('personage_speech/new.html.twig', [
            'personage_speech' => $personageSpeech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personage_speech_show", methods={"GET"})
     */
    public function show(PersonageSpeech $personageSpeech): Response
    {
        return $this->render('personage_speech/show.html.twig', [
            'personage_speech' => $personageSpeech,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personage_speech_edit", methods={"GET","POST"})
     * @Security("is_granted(constant('App\\Entity\\User::ROLE_FOR_EDITION'))")
     */
    public function edit(Request $request, PersonageSpeech $personageSpeech): Response
    {
        $form = $this->createForm(PersonageSpeechType::class, $personageSpeech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personage_speech_index');
        }

        return $this->render('personage_speech/edit.html.twig', [
            'personage_speech' => $personageSpeech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personage_speech_delete", methods={"DELETE"})
     * @Security("is_granted(constant('App\\Entity\\User::ROLE_FOR_EDITION'))")
     */
    public function delete(Request $request, PersonageSpeech $personageSpeech): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personageSpeech->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personageSpeech);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personage_speech_index');
    }
}
