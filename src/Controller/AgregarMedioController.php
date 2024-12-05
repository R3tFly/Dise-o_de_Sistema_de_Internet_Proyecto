<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AgregarMedioController extends AbstractController
{
    #[Route('/agregar/medio', name: 'app_agregar_medio')]
    public function index(): Response
    {
        return $this->render('agregar_medio/index.html.twig', [
            'controller_name' => 'AgregarMedioController',
        ]);
    }
}
