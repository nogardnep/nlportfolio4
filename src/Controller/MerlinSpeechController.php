<?php

namespace App\Controller;

use App\Entity\MerlinSpeech;
use App\Repository\MerlinSpeechRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MerlinSpeechController extends AbstractController
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

    /**
     * @return Response
     */
    public function index(): Response
    {
        return $this->render(
            'pages/merlin-speech/index.html.twig',
            [
                'current_page' => 'merlin_speech'
            ]
        );
    }

    /**
     * @param MerlinSpeech
     * @return Response
     */
    public function show(MerlinSpeech $speech): Response
    {
        return $this->render(
            'pages/merlin-speech/show.html.twig',
            [
                'current_page' => 'merlin_speech',
                'speech' => $speech
            ]
        );
    }

    /**
     * @todo: delete
     */
    public function populate()
    {
        $speech = new MerlinSpeech();
        $speech
            ->setSubject("temps")
            ->setText("<p>Soyez sans crainte : avec le temps le cœur s'endurcit... et le poids des années s'allège.</p>");

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($speech);
        $entityManager->flush();
    }
}
