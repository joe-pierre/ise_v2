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

    #[Route('/details-du-concours', name: 'app_details_concours')]
    public function detailConcours(): Response
    {
        return $this->render('page/concours_ise.html.twig');
    }

    #[Route('/procedure-dinscription-pour-les-etudiants-inscrits-a-lucad', name: 'app_inscription_etudiant_ucad')]
    public function inscriptionEtudiantUcad(): Response
    {
        return $this->render('page/inscription_etudiant_ucad.html.twig');
    }
    
    #[Route('/procedure-dinscription-pour-les-anciens-etudiants-de-lucad', name: 'app_inscription_ancien_etudiant_ucad')]
    public function inscriptionAncienEtudiantUcad(): Response
    {
        return $this->render('page/inscription_ancien_etudiant_ucad.html.twig');
    }
    
    #[Route('/procedure-dinscription-pour-les-etudiants-etrangers-ou-hors-ucad', name: 'app_inscription_etudiant_hors_ucad')]
    public function inscriptionEtudiantHorsUcad(): Response
    {
        return $this->render('page/inscription_etudiant_hors_ucad.html.twig');
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
