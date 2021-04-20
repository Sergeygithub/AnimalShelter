<?php

namespace AnimalShelter\Repository;

use AnimalShelter\Entity\Animal;
use Doctrine\ORM\EntityRepository;

class AnimalRepository extends EntityRepository
{
    public function getAvailableAnimalsByType(string $type, $orderBy = 'id'): array
    {
        return $this->findBy(['type' => $type, 'status' => Animal::STATUS_ADOPTED], [$orderBy => 'asc']);
    }

    public function getAnimalToTransmit(string $type = null, $orderBy = 'id'): ?Animal
    {
        $criteria = ['status' => Animal::STATUS_ADOPTED];
        if (!is_null($type)) {
            $criteria['type'] = $type;
        }

        return $this->findOneBy($criteria, [$orderBy => 'asc']);
    }
}
