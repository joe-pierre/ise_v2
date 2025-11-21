<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PageController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('page/home.html.twig');
    }

    #[Route('/formations', name: 'app_formation')]
    public function formation(): Response
    {
        return $this->render('page/formation.html.twig');
    }

    #[Route('/admissions', name: 'app_admission')]
    public function admission(): Response
    {
        return $this->render('page/admission.html.twig');
    }
    
    #[Route('/enseignements', name: 'app_enseignement')]
    public function enseignement(): Response
    {
        return $this->render('page/formation.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('page/contact.html.twig');
    }
}
