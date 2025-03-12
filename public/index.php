<?php
session_start();
if(!isset($_SESSION)){
    header('Location: ../src/Controller/controller-connexion.php');
    exit;
} else {
    header('Location: ../src/Controller/controller-index.php');
    exit;
}