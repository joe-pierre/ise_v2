<?php

namespace App\Controller;

use App\Service\SitemapGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults: ['_format' => 'xml'])]
    public function sitemap(SitemapGenerator $generator): Response
    {
        $response = $this->render('sitemap/sitemap.xml.twig', [
            'urls' => $generator->generate(),
        ]);

        // Cache navigateur + proxy (Cloudflare, etc.)
        $response->setPublic();
        $response->setMaxAge(86400);        // 24h
        $response->setSharedMaxAge(86400);

        return $response;
    }
}
