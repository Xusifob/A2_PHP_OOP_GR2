<?php

/** @var \Doctrine\ORM\EntityManager $entityManager */
$entityManager = require __DIR__.'/bootstrap.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__ .'/view/',
]);

$twig = new Twig_Environment($loader,[
    // 'cache' => null
]);

return $entityManager;
