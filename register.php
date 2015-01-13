<?php

$em = require __DIR__ . '/header.php';

use Xusifob\PokemonBattle\Trainer;

$success = NULL;
$error = NULL;


if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){

    $trainer = new Trainer();

    $trainer
        ->setUserName($_POST['username'])
        ->setPassword($_POST['password']);

    /** @var \Doctrine\ORM\EntityRepository $trainerRepo */
    $trainerRepo = $em->getRepository('Xusifob\PokemonBattle\Trainer');


    try {
        $test = $trainerRepo->findOneBy([
            'userName' => $_POST['username']
        ]);
    }
    catch(Exception $e){
        $error = $e->getMessage();
    }
    if(NULL === $test) {
        try {
            $em->persist($trainer);
            $em->flush();
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
    else{
        vardump($test);
        $error = "The username you put already exists. Please use another one";
    }
    if(NULL === $error)
        $success = true;
}


// Display the model
echo $twig ->render('register.html.twig',[
    'success' => $success,
    'error' => $error,


]);
