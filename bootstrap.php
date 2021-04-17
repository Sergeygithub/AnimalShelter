<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once 'vendor/autoload.php';

$config = Setup::createXMLMetadataConfiguration([__DIR__ . '/config/xml']);
$conn = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite',
];
$entityManager = EntityManager::create($conn, $config);
