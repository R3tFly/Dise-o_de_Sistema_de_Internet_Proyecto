<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AgregarDocenteController extends AbstractController
{
    #[Route('/agregar/docente', name: 'app_agregar_docente')]
    public function index(): Response
    {
        return $this->render('agregar_docente/index.html.twig', [
            'controller_name' => 'AgregarDocenteController',
        ]);
    }
}
