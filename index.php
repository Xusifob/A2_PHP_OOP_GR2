<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__ . '/header.php';



// Display the model
echo $twig ->render('index.html.twig',[
]);
