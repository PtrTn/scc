<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\CoachingRequest;
use App\FormType\CoachingRequestFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CoachingController extends AbstractController
{
    /**
     * @Route("/coaching")
     */
    public function showCoachingPage(Request $request): Response
    {
        $entity = new CoachingRequest();
        $form = $this->createForm(CoachingRequestFormType::class, $entity);
        $form->handleRequest($request);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('coaching.html.twig', ['form' => $form->createView()]);
        }

        // Todo, submission logic.

        return $this->render('coaching.html.twig');
    }
}
