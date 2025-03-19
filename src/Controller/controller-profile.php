<?php 
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: controller-connexion.php");
}
else {
    
require_once '../../config.php';

// connexion à la base de données via PDO (PHP Data Objects) = création instance
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);

// options activées sur notre instance
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Récupération du nombre de publications, de follows et de followers
$sql = "SELECT count(post_id) as `posts`,
            (SELECT count(user_id) FROM 76_favorites
            WHERE fav_id = " . $_SESSION['user_id'] . " GROUP BY fav_id) as `followers`,
            (SELECT count(fav_id) FROM 76_favorites
            WHERE user_id = " . $_SESSION['user_id'] . " GROUP BY user_id) as `follows`
        FROM 76_posts
        WHERE user_id = " . $_SESSION['user_id'] . "
        GROUP BY user_id";


$stmt = $pdo->query($sql);
$countProfile = $stmt->fetchAll(PDO::FETCH_ASSOC);


// requete SQL me permettant de rechercher tous les posts
$sql = "SELECT * FROM `76_posts` NATURAL JOIN `76_pictures` WHERE `user_id` = " . $_SESSION['user_id'] . " ORDER BY `post_timestamp` DESC;";

// on prepare la requete pour se prémunir des injections SQL
$stmt = $pdo->query($sql);

// on stock le resultat de la requête dans un tableau associatif
$allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdo = '';

include_once'../View/view-profile.php';
}


