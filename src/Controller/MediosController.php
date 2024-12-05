<?php

namespace App\Controller;

use App\Entity\Medios;
use App\Form\MediosType;
use App\Repository\MediosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/medios')]
final class MediosController extends AbstractController
{
    #[Route(name: 'app_medios_index', methods: ['GET'])]
    public function index(MediosRepository $mediosRepository): Response
    {
        return $this->render('medios/index.html.twig', [
            'medios' => $mediosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medios_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $medio = new Medios();
        $form = $this->createForm(MediosType::class, $medio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($medio);
            $entityManager->flush();

            return $this->redirectToRoute('app_medios_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medios/new.html.twig', [
            'medio' => $medio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medios_show', methods: ['GET'])]
    public function show(Medios $medio): Response
    {
        return $this->render('medios/show.html.twig', [
            'medio' => $medio,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medios_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medios $medio, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MediosType::class, $medio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_medios_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('medios/edit.html.twig', [
            'medio' => $medio,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medios_delete', methods: ['POST'])]
    public function delete(Request $request, Medios $medio, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$medio->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($medio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_medios_index', [], Response::HTTP_SEE_OTHER);
    }
}
