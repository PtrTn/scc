<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class AtletenController extends AbstractController
{
    #[Route('/atleten')]
    public function showAtletenPage(): Response
    {
        return $this->render('atleten.html.twig');
    }
}
