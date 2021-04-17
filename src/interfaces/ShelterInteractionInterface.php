<?php

namespace AnimalShelter\interfaces;

use AnimalShelter\models\Animal;

interface ShelterInteractionInterface
{
    /**
     * Adopt the animal to the shelter
     * Returning true on success or false otherwise
     * @param Animal $animal
     * @return bool
     */
    public function adopt(Animal $animal): bool;

    /**
     * Transmit the animal from the shelter
     * Returning true on success or false otherwise
     * @param Animal $animal
     * @return bool
     */
    public function transmit(Animal $animal): bool;
}
