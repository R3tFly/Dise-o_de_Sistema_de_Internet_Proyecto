<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EditarAulaController extends AbstractController
{
    #[Route('/editar/aula', name: 'app_editar_aula')]
    public function index(): Response
    {
        return $this->render('editar_aula/index.html.twig', [
            'controller_name' => 'EditarAulaController',
        ]);
    }
}
