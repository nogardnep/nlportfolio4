<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @param PropertyRepository
     * @return Response
     */
    public function index(): Response
    {
        // $merlin_speeches = $merlinSpeechRepository->findLastOnes();
        // dump($merlin_speeches);

        return $this->render('pages/home.html.twig',[
            //'merlin_speeches' => $merlin_speeches
        ]);
    }
}
