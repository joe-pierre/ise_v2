<?php

namespace App\Service;

use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
// use App\Repository\ArticleRepository;

class SitemapGenerator
{
    public function __construct(
        private RouterInterface $router,
        // private ArticleRepository $articleRepository
    ) {}

    public function generate(): array
    {
        $urls = [];

        /** ROUTES STATIQUES */
        foreach ($this->router->getRouteCollection()->all() as $name => $route) {

            if (!str_starts_with($name, 'app_')) continue;
            if (str_contains($name, 'admin')) continue;
            if (str_contains($route->getPath(), '{')) continue;

            $urls[] = [
                'loc' => $this->router->generate($name, [], UrlGeneratorInterface::ABSOLUTE_URL),
                'lastmod' => new \DateTime(),
                'changefreq' => 'monthly',
                'priority' => $name === 'app_home' ? '1.0' : '0.8',
            ];
        }

        /** CONTENU DYNAMIQUE (Articles / actualités) */
        // foreach ($this->articleRepository->findPublished() as $article) {
        //     $urls[] = [
        //         'loc' => $this->router->generate('app_article_show', [
        //             'slug' => $article->getSlug(),
        //         ], UrlGeneratorInterface::ABSOLUTE_URL),
        //         'lastmod' => $article->getUpdatedAt(),
        //         'changefreq' => 'weekly',
        //         'priority' => '0.7',
        //     ];
        // }

        return $urls;
    }
}
