<?php

namespace App\Controller;

use App\Entity\MerlinSpeech;
use App\Form\MerlinSpeechType;
use App\Repository\MerlinSpeechRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/merlin-speech")
 */
class MerlinSpeechController extends AbstractController
{
    /**
     * @Route("/", name="merlin_speech_index", methods={"GET"})
     */
    public function index(MerlinSpeechRepository $speechRepository): Response
    {
        return $this->render('merlin_speech/index.html.twig', [
            'merlin_speeches' => $speechRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="merlin_speech_new", methods={"GET","POST"})
     * @Security("is_granted(constant('App\\Entity\\User::ROLE_FOR_EDITION'))")
     */
    public function new(Request $request): Response
    {
        $merlinSpeech = new MerlinSpeech();
        $form = $this->createForm(MerlinSpeechType::class, $merlinSpeech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($merlinSpeech);
            $entityManager->flush();

            return $this->redirectToRoute('merlin_speech_index');
        }

        return $this->render('merlin_speech/new.html.twig', [
            'merlin_speech' => $merlinSpeech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="merlin_speech_show", methods={"GET"})
     */
    public function show(MerlinSpeech $merlinSpeech): Response
    {
        return $this->render('merlin_speech/show.html.twig', [
            'merlin_speech' => $merlinSpeech,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="merlin_speech_edit", methods={"GET","POST"})
     * @Security("is_granted(constant('App\\Entity\\User::ROLE_FOR_EDITION'))")
     */
    public function edit(Request $request, MerlinSpeech $merlinSpeech): Response
    {
        $form = $this->createForm(MerlinSpeechType::class, $merlinSpeech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('merlin_speech_index');
        }

        return $this->render('merlin_speech/edit.html.twig', [
            'merlin_speech' => $merlinSpeech,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="merlin_speech_delete", methods={"DELETE"})
     * @Security("is_granted(constant('App\\Entity\\User::ROLE_FOR_EDITION'))")
     */
    public function delete(Request $request, MerlinSpeech $merlinSpeech): Response
    {
        if ($this->isCsrfTokenValid('delete'.$merlinSpeech->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($merlinSpeech);
            $entityManager->flush();
        }

        return $this->redirectToRoute('merlin_speech_index');
    }
}
