<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditarMedioController extends AbstractController
{
    #[Route('/editar/medio', name: 'app_editar_medio')]
    public function index(): Response
    {
        return $this->render('editar_medio/index.html.twig', [
            'controller_name' => 'EditarMedioController',
        ]);
    }
}
