<?php

namespace App\Controller;

use App\Entity\Speech;
use App\Form\SpeechType;
use App\Repository\SpeechRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/speech")
 */
class SpeechController extends AbstractController
{
    /**
     * @Route("/", name="speech_index", methods={"GET"})
     */
    public function index(SpeechRepository $speechRepository): Response
    {
        return $this->render('speech/index.html.twig', [
            'speeches' => $speechRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="speech_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $speech = new Speech();
        $form = $this->createForm(SpeechType::class, $speech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($speech);
            $entityManager->flush();

            return $this->redirectToRoute('speech_index');
        }

        return $this->render('speech/new.html.twig', [
            'speech' => $speech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="speech_show", methods={"GET"})
     */
    public function show(Speech $speech): Response
    {
        return $this->render('speech/show.html.twig', [
            'speech' => $speech,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="speech_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Speech $speech): Response
    {
        $form = $this->createForm(SpeechType::class, $speech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('speech_index');
        }

        return $this->render('speech/edit.html.twig', [
            'speech' => $speech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="speech_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Speech $speech): Response
    {
        if ($this->isCsrfTokenValid('delete'.$speech->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($speech);
            $entityManager->flush();
        }

        return $this->redirectToRoute('speech_index');
    }
}
