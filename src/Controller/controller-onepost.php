<?php
session_start();

// on regarde si l'utilisateur est bien loggé
if (!isset($_SESSION['user_id']) OR !isset($_GET['post']) OR empty($_GET['post'])) {
    // on renvoie vers la page profile si non
    header('Location: controller-profile.php');
    exit;
}

require_once '../../config.php';

// connexion à la base de données via PDO (PHP Data Objects) = création instance
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT `post_id`, `user_id`, `post_description`, `user_avatar`, `user_pseudo`, `pic_name`, `post_timestamp` FROM `76_posts` NATURAL JOIN `76_users` NATURAL JOIN `76_pictures` WHERE `post_id` = " . $_GET['post'];

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->query($sql);

// on stock le resultat de la requête dans un tableau associatif
$uniquePost = $stmt->fetch(PDO::FETCH_ASSOC);

$pdo = '';

if(empty($uniquePost)){
    header('Location: controller-profile.php');
    exit;
}

// connexion à la base de données via PDO (PHP Data Objects) = création instance
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT `com_text`, `user_id`, `user_pseudo` FROM `76_comments` NATURAL JOIN `76_users` WHERE `post_id` = " . $_GET['post'];

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->query($sql);

// on stock le resultat de la requête dans un tableau associatif
$allComments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

$errors = [];

// Fonction pour nettoyer le string qu'on récupère
function safeInput($string)
{
    $input = trim($string);
    $input = htmlspecialchars($input);
    return $input;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Gestion des erreurs dans l'ajout du commentaires
    if (isset($_POST['comment'])) {
        if (empty($_POST['comment'])) {
            $errors['comment'] = "Rentrez un commentaire";
        } else if (strlen(safeInput($_POST['comment'])) <= 3) {
            $errors['comment'] = "Le commentaire doit faire au moins 3 caractères";
        }
    }

    if (empty($errors)) {

        // Ajout du commentaire validé
        $sql = "INSERT INTO `76_comments` (`com_text`, `post_id`, `user_id`, `com_timestamp`) VALUES
            ('" . ($_POST['comment']) . "', " .  $_GET['post'] . ", " . $_SESSION['user_id'] . ", " . time() . " )";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        header("Refresh:1");
    }
}




include_once '../View/view-onepost.php';