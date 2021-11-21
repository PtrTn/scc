<?php

namespace App\Controller\Admin;

use App\Entity\ParticipationRequest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ParticipationRequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ParticipationRequest::class;
    }
}
