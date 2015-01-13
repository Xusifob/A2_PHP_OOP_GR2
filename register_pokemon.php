<?php
$em = require __DIR__ . '/bootstrap.php';

use Xusifob\PokemonBattle\Pokemon;

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('Xusifob\PokemonBattle\Trainer');

$trainer = $trainerRepo->find(1);

$pokemon = new Pokemon();

$pokemon
    ->setName('Pokemon')
    ->setHP(100)
    ->setTrainer($trainer)
    ->setType(Pokemon::TYPE_FIRE)
;

vardump($pokemon);

$em->persist($pokemon);

$em->flush();
