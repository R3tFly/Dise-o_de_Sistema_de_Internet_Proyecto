<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HorarioSemanaController extends AbstractController
{
    #[Route('/horario/semana', name: 'app_horario_semana')]
    public function index(): Response
    {
        return $this->render('horario_semana/index.html.twig', [
            'controller_name' => 'HorarioSemanaController',
        ]);
    }
}
