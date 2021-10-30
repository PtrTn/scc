<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

final class HomeController extends AbstractController
{
    public function __construct()
    {

    }

    /**
     * @Route("/")
     */
    public function number()
    {
        return $this->render('homepage.html.twig');
    }
}
