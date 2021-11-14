<?php

namespace App\Repository;

use App\Entity\CoachingRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoachingRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachingRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachingRequest[]    findAll()
 * @method CoachingRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachingRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachingRequest::class);
    }
}
