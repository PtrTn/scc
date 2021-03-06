<?php

namespace App\Repository;

use App\Entity\ParticipationRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ParticipationRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParticipationRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParticipationRequest[]    findAll()
 * @method ParticipationRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipationRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParticipationRequest::class);
    }

    public function save(ParticipationRequest $entity): void
    {
        $this->_em->persist($entity);
        $this->_em->flush();
    }
}
