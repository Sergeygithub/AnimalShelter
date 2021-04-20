<?php

namespace AnimalShelter;

use AnimalShelter\Interfaces\ShelterInteractionInterface;
use AnimalShelter\Entity\Animal;
use Doctrine\ORM\EntityManager;

class ShelterManager implements ShelterInteractionInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function adopt(Animal $animal): bool
    {
        if ($animal->getId()) return false;//Already at the shelter

        $animal->setStatus(Animal::STATUS_ADOPTED);
        $animal->setAdoptedAt(new \DateTime());

        $this->entityManager->persist($animal);
        $this->entityManager->flush();
        $this->entityManager->clear();

        return true;
    }

    public function transmit(Animal $animal): bool
    {
        if (!$animal->getId() || $animal->getStatus() !== Animal::STATUS_ADOPTED) return false;//Not at the shelter

        $animal->setStatus(Animal::STATUS_TRANSMITTED);
        $animal->setTransmittedAt(new \DateTime());

        $this->entityManager->persist($animal);
        $this->entityManager->flush();
        $this->entityManager->clear();

        return true;
    }
}
