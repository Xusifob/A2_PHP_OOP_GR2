<?php
/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__ . '/_header.php';

if(!isset($_SESSION['connect']) || true !== $_SESSION['connect'])
    header('Location:index.php');

return $em;