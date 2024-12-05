<?php

namespace App\Controller;

use App\Entity\Aulas;
use App\Form\AulasType;
use App\Repository\AulasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/aulas')]
final class AulasController extends AbstractController
{
    #[Route(name: 'app_aulas_index', methods: ['GET'])]
    public function index(AulasRepository $aulasRepository): Response
    {
        return $this->render('aulas/index.html.twig', [
            'aulas' => $aulasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_aulas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $aula = new Aulas();
        $form = $this->createForm(AulasType::class, $aula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aula);
            $entityManager->flush();

            return $this->redirectToRoute('app_aulas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aulas/new.html.twig', [
            'aula' => $aula,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_aulas_show', methods: ['GET'])]
    public function show(Aulas $aula): Response
    {
        return $this->render('aulas/show.html.twig', [
            'aula' => $aula,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_aulas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Aulas $aula, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AulasType::class, $aula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_aulas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('aulas/edit.html.twig', [
            'aula' => $aula,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_aulas_delete', methods: ['POST'])]
    public function delete(Request $request, Aulas $aula, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aula->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($aula);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_aulas_index', [], Response::HTTP_SEE_OTHER);
    }
}
