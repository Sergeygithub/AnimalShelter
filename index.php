<?php

use AnimalShelter\models\Animal;
use AnimalShelter\ShelterManager;
use Doctrine\ORM\EntityManager;

require_once 'bootstrap.php';

/**
 * @var EntityManager $entityManager
 */
$shelterManager = new ShelterManager($entityManager);

/*
 * 1. Поместить в приют
 */
$animalType = Animal::ANIMAL_TYPE_CAT;
if (Animal::isValidType($animalType)) {
    $animal = new Animal();
    $animal->setType($animalType);
    $animal->setName('cat name');
    $animal->setAge(3);

    $shelterManager->adopt($animal);
}


/*
 * 2. Посмотреть всех животных определенного типа, сортированных по кличке в алфавитном порядке.
 */
$animalType = Animal::ANIMAL_TYPE_DOG;
$animals = $shelterManager->getAnimalsByType($animalType);
var_export($animals);


/*
 * 3. Передать человеку животное (определенного типа), находящееся в приюте наибольшее время.
 */
$animalType = Animal::ANIMAL_TYPE_TURTLE;
$animal = $entityManager->getRepository(Animal::class)
    ->findOneBy(['type' => $animalType], ['adoptedAt' => 'asc']);
if ($animal) {
    $shelterManager->transmit($animal);
}


/*
 * 4. Передать человеку животное (без указания типа), находящееся приюте наибольшее время.
 */
$animalType = Animal::ANIMAL_TYPE_TURTLE;
$animal = $entityManager->getRepository(Animal::class)
    ->findOneBy([], ['adoptedAt' => 'asc']);
if ($animal) {
    $shelterManager->transmit($animal);
}
