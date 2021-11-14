<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class AtletenController extends AbstractController
{
    /**
     * @Route("/atleten")
     */
    public function number(): Response
    {
        return $this->render('atleten.html.twig');
    }
}
