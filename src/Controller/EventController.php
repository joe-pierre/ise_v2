<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EventController extends AbstractController
{
    #[Route('/evenements', name: 'app_event_index')]
    public function index(): Response
    {
        return $this->render('event/index.html.twig');
    }

    #[Route('/evenements/journee-mondiale-de-lenvironnement-2026', name: 'app_event_show')]
    public function show(): Response
    {
        return $this->render('event/jme_2026.html.twig');
    }
}
