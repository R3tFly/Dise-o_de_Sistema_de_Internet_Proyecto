<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class LoginSuccessHandler implements AuthenticationSuccessHandlerInterface
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token): RedirectResponse
    {
        // Obtener el usuario autenticado
        $user = $token->getUser();

        // Verificar si el usuario es válido y tiene el método getTipoUsuario
        if (method_exists($user, 'getTipoUsuario') && $user->getTipoUsuario()) {
            $tipoUsuario = $user->getTipoUsuario()->getNombreTipo(); // Ajustar si el tipoUsuario tiene otro campo

            // Redirigir según el tipo de usuario
            switch ($tipoUsuario) {
                case 'Administrador':
                    $route = 'app_medios_index';
                    break;
                case 'Docente':
                    $route = 'app_menu_docente';
                    break;
                
            }
        } else {
            $route = 'app_login'; // Redirigir al login si no hay tipoUsuario
        }

        return new RedirectResponse($this->urlGenerator->generate($route));
    }
}
