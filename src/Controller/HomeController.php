<?php

namespace App\Controller;

use App\Repository\MerlinSpeechRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @param PropertyRepository
     * @return Response
     */
    public function index(MerlinSpeechRepository $merlinSpeechRepository): Response
    {
        $merlin_speeches = $merlinSpeechRepository->findLastOnes();
        dump($merlin_speeches);

        return $this->render('pages/home.html.twig',[
            'merlin_speeches' => $merlin_speeches
        ]);
    }
}
