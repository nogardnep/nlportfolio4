<?php

namespace App\Controller\Admin;

use App\Entity\MerlinSpeech;
use App\Form\MerlinSpeechType;
use App\Repository\MerlinSpeechRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AdminMerlinSpeechController extends AbstractController
{
    /**
     * @var MerlinSpeechRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(MerlinSpeechRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function index()
    {
        $speeches = $this->repository->findAll();

        return $this->render(
            'admin/merlin-speech/index.html.twig',
            [
                compact('speeches'),
                'speeches' => $speeches
            ]
        );
    }

    /**
     * @param Request
     * @return Response
     */
    public function create(Request $request)
    {
        $speech = new MerlinSpeech();
        $form = $this->createForm(MerlinSpeechType::class, $speech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($speech);
            $this->entityManager->flush();
            $this->addFlash('success', 'Merlin a bien retenu cette nouvelle pensée.');

            return $this->redirectToRoute('admin.merlin_speech.index');
        }

        return $this->render(
            'admin/merlin-speech/create.html.twig',
            [
                'current_page' => 'merlin_speech',
                'speech' => $speech,
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @param MerlinSpeech
     * @param Request
     * @return Response
     */
    public function edit(MerlinSpeech $speech, Request $request): Response
    {
        $form = $this->createForm(MerlinSpeechType::class, $speech);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->flush();
            $this->addFlash('success', 'Bien, cette pensée sera donc déshormais formulée ainsi.');

            return $this->redirectToRoute('admin.merlin_speech.index');
        }

        return $this->render(
            'admin/merlin-speech/edit.html.twig',
            [
                'current_page' => 'merlin_speech',
                'speech' => $speech,
                'form' => $form->createView()
            ]
        );
    }

    /**
     * @param MerlinSpeech
     * @param Request
     * @return Response
     */
    public function delete(MerlinSpeech $speech, Request $request): Response
    {
        if ($this->isCsrfTokenValid('delete' . $speech->getId(), $request->get('_token'))) {
            $this->entityManager->remove($speech);
            $this->entityManager->flush();
            $this->addFlash('success', 'Bien, cette pensée sera donc oubliée.');

            return $this->redirectToRoute('admin.merlin_speech.index');
        } else {
            return new Response("Mauvais esprits ! votre magie ne peut rien contre moi.");
        }
    }
}
