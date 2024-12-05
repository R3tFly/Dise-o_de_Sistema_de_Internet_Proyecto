<?php

namespace App\Controller;

use App\Entity\Usuariouni;
use App\Form\UsuariouniType;
use App\Repository\UsuariouniRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/usuariouni')]
final class UsuariouniController extends AbstractController
{
    #[Route(name: 'app_usuariouni_index', methods: ['GET'])]
    public function index(UsuariouniRepository $usuariouniRepository): Response
    {
        return $this->render('usuariouni/index.html.twig', [
            'usuariounis' => $usuariouniRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_usuariouni_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $usuariouni = new Usuariouni();
        $form = $this->createForm(UsuariouniType::class, $usuariouni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($usuariouni);
            $entityManager->flush();

            return $this->redirectToRoute('app_usuariouni_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('usuariouni/new.html.twig', [
            'usuariouni' => $usuariouni,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_usuariouni_show', methods: ['GET'])]
    public function show(Usuariouni $usuariouni): Response
    {
        return $this->render('usuariouni/show.html.twig', [
            'usuariouni' => $usuariouni,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_usuariouni_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Usuariouni $usuariouni, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UsuariouniType::class, $usuariouni);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_usuariouni_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('usuariouni/edit.html.twig', [
            'usuariouni' => $usuariouni,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_usuariouni_delete', methods: ['POST'])]
    public function delete(Request $request, Usuariouni $usuariouni, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usuariouni->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($usuariouni);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_usuariouni_index', [], Response::HTTP_SEE_OTHER);
    }
}
