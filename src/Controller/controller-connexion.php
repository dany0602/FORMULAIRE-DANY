<?php

session_start();

include_once '../../config.php';

// un défini un tableau vide
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'Rentrez votre email';
            // verifie si caractère autorisé
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'Rentrez votre mot de passe';
            // verifie si caractère autorisé
        }
    }

    if ((!empty($_POST['email'])) && (!empty($_POST['password']))) {


        $pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . '; charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // on stock les requetes avec les marqueurs
        $sql = "SELECT * FROM `76_users` WHERE `user_pseudo` = :email OR `user_mail` = :email;";
        // on prepare la requete pour se prémunir des injections SQL
        $stmt = $pdo->prepare($sql);
        // ON BIND LA VALEUR DU POST
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->rowCount() == 0 ? $found = false : $found = true;

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($found == false) {
            $errors['connexion'] = "Identifiant ou mot de passe invalide";
        } else {
            if (password_verify($_POST['password'], $user['user_password'])) {
                $_SESSION = $user;
                header('location: controller-profile.php');
                exit;
            } else {
                $errors['connexion'] = 'identifiant ou de passe incorrect';
            }
        }
        $pdo = '';
    }
}
?>

<?php include_once '../View/view-connexion.php';
