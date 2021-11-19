<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\CoachingRequest;
use App\FormType\CoachingRequestFormType;
use App\Repository\CoachingRequestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class CoachingController extends AbstractController
{
    private CoachingRequestRepository $repository;

    public function __construct(CoachingRequestRepository $repository)
    {
        $this->repository = $repository;
    }

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

        $this->repository->save($entity);

        // Todo, email logic.

        return $this->render('coaching.html.twig');
    }
}
