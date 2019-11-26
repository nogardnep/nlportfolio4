<?php

namespace App\Controller;

use App\Entity\Personage;
use App\Form\PersonageType;
use App\Repository\PersonageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/personage")
 */
class PersonageController extends AbstractController
{
    /**
     * @Route("/", name="personage_index", methods={"GET"})
     */
    public function index(PersonageRepository $personageRepository): Response
    {
        return $this->render('personage/index.html.twig', [
            'personages' => $personageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="personage_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $personage = new Personage();
        $form = $this->createForm(PersonageType::class, $personage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personage);
            $entityManager->flush();

            return $this->redirectToRoute('personage_index');
        }

        return $this->render('personage/new.html.twig', [
            'personage' => $personage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personage_show", methods={"GET"})
     */
    public function show(Personage $personage): Response
    {
        return $this->render('personage/show.html.twig', [
            'personage' => $personage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="personage_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Personage $personage): Response
    {
        $form = $this->createForm(PersonageType::class, $personage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personage_index');
        }

        return $this->render('personage/edit.html.twig', [
            'personage' => $personage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="personage_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Personage $personage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personage_index');
    }
}
