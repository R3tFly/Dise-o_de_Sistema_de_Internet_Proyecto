<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AgregarAulaController extends AbstractController
{
    #[Route('/agregar/aula', name: 'app_agregar_aula')]
    public function index(): Response
    {
        return $this->render('agregar_aula/index.html.twig', [
            'controller_name' => 'AgregarAulaController',
        ]);
    }
}
