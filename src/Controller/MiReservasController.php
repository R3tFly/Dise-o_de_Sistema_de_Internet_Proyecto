<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MiReservasController extends AbstractController
{
    #[Route('/mi/reservas', name: 'app_mi_reservas')]
    public function index(): Response
    {
        return $this->render('mi_reservas/index.html.twig', [
            'controller_name' => 'MiReservasController',
        ]);
    }
}
