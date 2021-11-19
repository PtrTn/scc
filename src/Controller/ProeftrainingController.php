<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\ParticipationRequest;
use App\FormType\ParticipationRequestFormType;
use App\Repository\ParticipationRequestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ProeftrainingController extends AbstractController
{
    private ParticipationRequestRepository $repository;

    public function __construct(ParticipationRequestRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route('/proeftraining')]
    public function showProeftrainingPage(Request $request): Response
    {
        $entity = new ParticipationRequest();
        $form = $this->createForm(ParticipationRequestFormType::class, $entity);
        $form->handleRequest($request);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('proeftraining.html.twig', ['form' => $form->createView()]);
        }

        $this->repository->save($entity);

        // Todo, email logic.

        return $this->render('proeftraining.html.twig');
    }
}
