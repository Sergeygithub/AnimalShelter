<?php

use AnimalShelter\Entity\Animal;
use AnimalShelter\Repository\AnimalRepository;
use AnimalShelter\ShelterManager;
use Doctrine\ORM\EntityManager;

require_once 'bootstrap.php';

/**
 * @var EntityManager $entityManager
 * @var AnimalRepository $animalRepository
 */
$shelterManager = new ShelterManager($entityManager);
$animalRepository = $entityManager->getRepository(Animal::class);

/*
 * 1. Поместить в приют
 */
$animalType = Animal::ANIMAL_TYPE_CAT;
$animal = new Animal();
$animal->setType($animalType);
$animal->setName('cat name');
$animal->setAge(3);

$shelterManager->adopt($animal);


/*
 * 2. Посмотреть всех животных определенного типа, сортированных по кличке в алфавитном порядке.
 */
$animalType = Animal::ANIMAL_TYPE_DOG;
$animals = $animalRepository->getAvailableAnimalsByType($animalType, 'name');
var_export($animals);


/*
 * 3. Передать человеку животное (определенного типа), находящееся в приюте наибольшее время.
 */
$animalType = Animal::ANIMAL_TYPE_TURTLE;
$animal = $animalRepository->getAnimalToTransmit($animalType, 'adoptedAt');
if ($animal) {
    $shelterManager->transmit($animal);
}


/*
 * 4. Передать человеку животное (без указания типа), находящееся приюте наибольшее время.
 */
$animal = $animalRepository->getAnimalToTransmit(null, 'adoptedAt');
if ($animal) {
    $shelterManager->transmit($animal);
}
