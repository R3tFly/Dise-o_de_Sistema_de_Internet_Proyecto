<?php

namespace App\Controller;

use App\Entity\Reservaciones;
use App\Form\ReservacionesType;
use App\Repository\ReservacionesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reservaciones')]
final class ReservacionesController extends AbstractController
{
    #[Route(name: 'app_reservaciones_index', methods: ['GET'])]
    public function index(ReservacionesRepository $reservacionesRepository): Response
    {
        return $this->render('reservaciones/index.html.twig', [
            'reservaciones' => $reservacionesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reservaciones_new', methods: ['GET', 'POST'])]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $reservacione = new Reservaciones();
    
    // Asigna el usuario autenticado y el estado predeterminado
    $user = $this->getUser(); // Obtiene el usuario actualmente autenticado
    $reservacione->setUsuarioId($user);
    $reservacione->setEstado('Reservado');
    
    // Fecha mínima y máxima (día actual + 2 días)
    $today = new \DateTime();
    $minDate = $today->modify('-1 day')->format('Y-m-d'); // Día actual
    $maxDate = $today->modify('+3 days')->format('Y-m-d'); // Día actual + 2 días
    
    // Hora mínima y máxima para hora_inicio
    $minHoraInicio = '07:20';
    $maxHoraInicio = '16:45';
    
    // Hora máxima para hora_final (hasta las 17:00)
    $maxHoraFinal = '17:00';
    
    // Crea el formulario
    $form = $this->createForm(ReservacionesType::class, $reservacione);
    
    // Modifica los atributos 'min' y 'max' para fecha
    $form->get('fecha')->getConfig()->getOptions()['attr']['min'] = $minDate;
    $form->get('fecha')->getConfig()->getOptions()['attr']['max'] = $maxDate;
    
    // Modifica los atributos 'min' y 'max' para hora_inicio y hora_final
    $form->get('hora_inicio')->getConfig()->getOptions()['attr']['min'] = $minHoraInicio;
    $form->get('hora_inicio')->getConfig()->getOptions()['attr']['max'] = $maxHoraInicio;
    $form->get('hora_final')->getConfig()->getOptions()['attr']['max'] = $maxHoraFinal;
    
    $form->handleRequest($request);
    
    if ($form->isSubmitted() && $form->isValid()) {
        $medios = $reservacione->getMediosId();
        
        // Verifica si la cantidad de 'Medios' es 0
        if ($medios && $medios->getCantidad() > 0) {
            // Si hay cantidad disponible, decrementa la propiedad 'cantidad'
            $cantidadActual = $medios->getCantidad();
            $medios->setCantidad($cantidadActual - 1); // Disminuir la cantidad
            
            // Persistir el objeto Medios con la nueva cantidad
            $entityManager->persist($medios);

            // Persistir la nueva reservación
            $entityManager->persist($reservacione);
            $entityManager->flush();
        
            return $this->redirectToRoute('app_menu_docente', [], Response::HTTP_SEE_OTHER);
        } else {
            // Si la cantidad es 0, muestra un mensaje de error
            $this->addFlash('error', 'No hay cantidad disponible para esta reserva.');
        }
    }
    
    return $this->render('reservaciones/new.html.twig', [
        'reservacione' => $reservacione,
        'form' => $form->createView(),
        'minDate' => $minDate, // Pasa la fecha mínima a la vista
        'maxDate' => $maxDate, // Pasa la fecha máxima a la vista
    ]);
}


    #[Route('/{id}', name: 'app_reservaciones_show', methods: ['GET'])]
    public function show(Reservaciones $reservacione): Response
    {
        return $this->render('reservaciones/show.html.twig', [
            'reservacione' => $reservacione,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reservaciones_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservaciones $reservacione, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReservacionesType::class, $reservacione);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reservaciones_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reservaciones/edit.html.twig', [
            'reservacione' => $reservacione,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reservaciones_delete', methods: ['POST'])]
    public function delete(Request $request, Reservaciones $reservacione, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reservacione->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reservacione);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reservaciones_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/mi/reservas', name: 'app_reservaciones_mis_reservas', methods: ['GET'])]
public function misReservas(ReservacionesRepository $reservacionesRepository): Response
{
    $usuario = $this->getUser(); // Usuario autenticado
    $reservas = $reservacionesRepository->findBy([
        'usuario_id' => $usuario,
        'estado' => 'Reservado'
    ]);

    return $this->render('mi_reservas/index.html.twig', [
        'reservas' => $reservas,
    ]);
}

#[Route('/{id}/cancelar', name: 'app_reservaciones_cancelar', methods: ['POST'])]
public function cancelarReserva(Reservaciones $reservacione, EntityManagerInterface $entityManager): Response
{
    $usuario = $this->getUser();

    if ($reservacione->getUsuarioId() !== $usuario) {
        throw $this->createAccessDeniedException('No tienes permiso para cancelar esta reservación.');
    }

    // Obtener el objeto Medios relacionado
    $medios = $reservacione->getMediosId();

    // Suponiendo que Medios tiene una propiedad 'cantidad' que deseas incrementar
    if ($medios) {
        $cantidadActual = $medios->getCantidad(); // Suponiendo que hay un método getCantidad()
        $medios->setCantidad($cantidadActual + 1); // Incrementamos en 1 la propiedad 'cantidad'
    }

    $reservacione->setEstado('Cancelado');
    $entityManager->flush();

    $this->addFlash('success', 'La reservación fue cancelada exitosamente.');
    return $this->redirectToRoute('app_reservaciones_mis_reservas');
}



#[Route('/horario/semana', name: 'app_reservaciones_horario_semana', methods: ['GET'])]
public function horario(ReservacionesRepository $reservacionesRepository): Response
{
    $reservas = $reservacionesRepository->findBy([
        'estado' => 'Reservado',
    ]);

    // Inicializa el arreglo de reservas por día
    $reservasPorDia = [
        'Lunes' => [],
        'Martes' => [],
        'Miércoles' => [],
        'Jueves' => [],
        'Viernes' => [],
        'Sábado' => [],
    ];

    // Organiza las reservas según el día de la semana
    $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    foreach ($reservas as $reserva) {
        $diaSemana = $reserva->getFecha()->format('N'); // 1 = Lunes, 7 = Domingo
        if ($diaSemana >= 1 && $diaSemana <= 6) { // Solo de lunes a sábado
            $reservasPorDia[$dias[$diaSemana - 1]][] = $reserva;
        }
    }

    return $this->render('horario_semana/index.html.twig', [
        'reservasPorDia' => $reservasPorDia,
        'reservas' => $reservas,
    ]);
}


}
