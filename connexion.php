<?php

$em = require __DIR__ . '/header.php';

$error = NULL;
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){

    /** @var \Doctrine\ORM\EntityRepository $trainerRepo */
    $trainerRepo = $em->getRepository('Xusifob\PokemonBattle\Trainer');

    try {
        $trainer = $trainerRepo->findOneBy([
            'userName' => $_POST['username']
        ]);
    }
    catch(Exception $e){
        $error = $e->getMessage();
    }
    if(!isset($trainer) || $trainer === NULL) {
        $error = "Connection failed, wrong password or username";
    }
    else{
        if($_POST['password'] === $trainer->getPassword()) {
            $_SESSION['trainer'] = $trainer->getId();
            $_SESSION['connect'] = true;
            header('Location:dashboard.php');
        }
        else{
            $error = "Connection failed, wrong password or username";
        }
    }

}


// Display the model
echo $twig ->render('connexion.html.twig',[
    'error' => $error,


]);
