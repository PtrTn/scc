<?php

namespace App\Controller\Admin;

use App\Entity\CoachingRequest;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CoachingRequestCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CoachingRequest::class;
    }
}
