<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function number(): Response
    {
        return $this->render('homepage.html.twig');
    }
}
