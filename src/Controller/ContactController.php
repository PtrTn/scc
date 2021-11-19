<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\ContactMessage;
use App\FormType\ContactMessageFormType;
use App\Repository\ContactMessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class ContactController extends AbstractController
{
    private ContactMessageRepository $repository;

    public function __construct(ContactMessageRepository $repository)
    {
        $this->repository = $repository;
    }

    #[Route('/contact')]
    public function showContactPage(Request $request): Response
    {
        $entity = new ContactMessage();
        $form = $this->createForm(ContactMessageFormType::class, $entity);
        $form->handleRequest($request);
        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->render('contact.html.twig', ['form' => $form->createView()]);
        }

        $this->repository->save($entity);

        // Todo, email logic.

        return $this->render('contact.html.twig');
    }
}
