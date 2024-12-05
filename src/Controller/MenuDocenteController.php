<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MenuDocenteController extends AbstractController
{
    #[Route('/menu/docente', name: 'app_menu_docente')]
    public function index(): Response
    {
        return $this->render('menu_docente/index.html.twig', [
            'controller_name' => 'MenuDocenteController',
        ]);
    }
}
