<?php
require_once '../../config.php';

// regex pour le formulaire
// uniquement des caractères alpha

$regex_name = "/^[a-zA-Z]+$/";

// un défini un tableau vide
$errors = [];

// lancement des test lors d'un post via formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['lastname'])) {
        // verifie si champs vide 
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['lastname'])) {
            $errors['lastname'] = 'caractère non autorisés';
        }
    }

    if (isset($_POST['firstname'])) {
        // verifie si champs vide 
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['firstname'])) {
            $errors['firstname'] = 'caractère non autorisés';
        }
    }

    
    $pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . '; charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on stock les requetes avec les marqueurs
    $sql= "SELECT * FROM `76_users` WHERE `user_pseudo` = :pseudo";
    // on prepare la requete pour se prémunir des injections SQL
    $stmt = $pdo->prepare($sql);
    // ON BIND LA VALEUR DU POST
    $stmt->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR);

    $stmt->execute();

    $stmt->rowCount() == 0 ? $found = false : $found = true;

    $pdo = '';


    if (isset($_POST['pseudo'])) {
        // verifie si champs vide 
        if (empty($_POST['pseudo'])) {
            $errors['pseudo'] = 'champs obligatoire';
         // verifie si caractère autorisé
        } else if (!preg_match($regex_name, $_POST['pseudo'])) {
            $errors['pseudo'] = 'caractère non autorisés';
        } else if ($found == true) {
            $errors['pseudo'] = 'Pseudo non disponible';
        }

    }


    $pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . '; charset=utf8', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // on stock les requetes avec les marqueurs
    $sql= "SELECT * FROM `76_users` WHERE `user_mail` = :mail";
    // on prepare la requete pour se prémunir des injections SQL
    $stmt = $pdo->prepare($sql);
    // ON BIND LA VALEUR DU POST
    $stmt->bindValue(':mail', $_POST['email'], PDO::PARAM_STR);

    $stmt->execute();

    $stmt->rowCount() == 0 ? $found = false : $found = true;

    $pdo = '';



    if (isset($_POST['email'])) {
        // verifie si champs vide 
        if (empty($_POST['email'])) {
            $errors['email'] = 'champs obligatoire';
            // verifie si caractère autorisé
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'pas une adresse mail';
         }else if ($found == true) {
            $errors['email'] = 'email non disponible';
        }
    }

    if (isset($_POST['password'])) {
        // verifie si champs vide 
        if (empty($_POST['password'])) {
            $errors['password'] = 'Entrez un MDP';
            // verifie si caractère autorisé
        }
    }

    if (isset($_POST['passwordconfirm'])) {
        // verifie si champs vide 
        if (empty($_POST['passwordconfirm'])) {
            $errors['passwordconfirm'] = 'Entrez un MDP';
            // verifie si caractère autorisé
        } else if ($_POST['password'] != $_POST['passwordconfirm']) {
            $errors['passwordconfirm'] = 'Mot de passe non similaire';
        }
    }

    if (isset($_POST['naissance'])) {
        // verifie si champs vide 
        if (empty($_POST['naissance'])) {
            $errors['naissance'] = 'Entrez votre date de naissance';
            // verifie si caractère autorisé
        }
    }

    if (isset($_POST['genre'])) {
        // verifie si champs vide 
        if (empty($_POST['genre'])) {
            $errors['genre'] = 'Choisissez un genre';
            // verifie si caractère autorisé
        }
        

    }


    // au final, si mon tableau d'erreurs est vide alors redirection
    if (empty($errors)) {
        $pdo = new PDO('mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . '; charset=utf8', DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO `76_users` (`user_lastname`,`user_firstname`,`user_pseudo`,`user_gender`,`user_birthdate`,`user_mail`,`user_password`)
            VALUES
            (:lastname, :firstname, :pseudo, :gender, :birthdate, :mail, :password);";


        function safeInput($string)
        {
            $input = trim($string);
            $input = htmlspecialchars($input);
            return $input;
        }

        // on prepare la requete avant l'utilisation
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':lastname', safeInput($_POST['lastname']), PDO::PARAM_STR);
        $stmt->bindValue(':firstname', safeInput($_POST['firstname']), PDO::PARAM_STR);
        $stmt->bindValue(':pseudo', safeInput($_POST['pseudo']), PDO::PARAM_STR);
        $stmt->bindValue(':gender', safeInput($_POST['genre']), PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', safeInput($_POST['naissance']), PDO::PARAM_STR);
        $stmt->bindValue(':mail', safeInput($_POST['email']), PDO::PARAM_STR);
        $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_DEFAULT), PDO::PARAM_STR);

        // on execute la requete
        if ($stmt->execute()) {
            header('location: controller-confirmation.php');
            exit;
        }

        // on supprime le pdo
        $pdo = '';
    }
}

// var_dump($_POST);

include '../View/view-inscription.php';
