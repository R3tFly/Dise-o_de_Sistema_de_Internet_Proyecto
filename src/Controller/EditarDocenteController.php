<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditarDocenteController extends AbstractController
{
    #[Route('/editar/docente', name: 'app_editar_docente')]
    public function index(): Response
    {
        return $this->render('editar_docente/index.html.twig', [
            'controller_name' => 'EditarDocenteController',
        ]);
    }
}
