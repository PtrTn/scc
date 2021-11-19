<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ArtikelenController extends AbstractController
{
    private array $blogPosts = [
        'high-bar-vs-low-bar-squat' => 'high-bar-low-bar.html.twig',
        'de-halter' => 'halters.html.twig',
        'programming-voor-powerlifting' => 'programming.html.twig',
        'deload' => 'deload.html.twig',
    ];

    /**
     * @Route("/artikelen")
     */
    public function articleListAction(Request $request): Response
    {
        return $this->render('artikelen/list.html.twig');
    }

    /**
     * @Route("/artikelen/{slug}", name="article_details")
     */
    public function articlePostAction(Request $request, string $slug): Response
    {
        $blogPost = $this->blogPosts[$slug] ?? null;

        if ($blogPost === null) {
            throw $this->createNotFoundException('Unable to find that article');
        }

        return $this->render(
            'artikelen/' . $blogPost,
            ['activePage' => 'artikelen']
        );
    }
}
