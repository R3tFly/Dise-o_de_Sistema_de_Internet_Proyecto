<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SolicitudMediosController extends AbstractController
{
    #[Route('/solicitud/medios', name: 'app_solicitud_medios')]
    public function index(): Response
    {
        return $this->render('solicitud_medios/index.html.twig', [
            'controller_name' => 'SolicitudMediosController',
        ]);
    }
}
