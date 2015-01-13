<?php

$em = require __DIR__ . '/header_connect.php';



// I set the vars to avoid errors
$error = NULL;
$delta = 0;
$fight = false;
$heal = false;
$dHeal = 0;

/** @var \Doctrine\ORM\EntityRepository $PokemonRepo */
$PokemonRepo = $em->getRepository('Xusifob\PokemonBattle\Pokemon');

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('Xusifob\PokemonBattle\Trainer');

try{
    $trainer = $trainerRepo->find($_SESSION['trainer']);
}
catch(Exception $e){
    $error = $e->getMessage();
}


// Get the pokemon
try {
    $pokemon = $PokemonRepo->findOneBy([
        'trainer' => $trainer,
    ]);
}
catch(Exception $e){
    $error = $e->getMessage();
}
// If the pokemon exists
if(!isset($pokemon) || NULL === $pokemon){
    $pokemon = NULL;
}

else{
    // Calculate if he can be healed or not
    $lastHeal = $pokemon->getLastHeal();
    if($lastHeal < time()-24*3600){
        // Heal it
        $pokemon
            ->setLastHeal(time())
            ->setHP(100)
            ;

        // Update database
        $em->flush();
        header('Location:dashboard.php');

    }
    else{
        header('Location:dashboard.php');
    }
}
