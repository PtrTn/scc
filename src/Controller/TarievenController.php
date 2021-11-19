<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class TarievenController extends AbstractController
{
    #[Route('/tarieven')]
    public function showTarievenPage(): Response
    {
        return $this->render('tarieven.html.twig');
    }
}
