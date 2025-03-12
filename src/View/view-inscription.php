
<?php include_once '../../templates/header.php' ?>
<style>
    label {
        font-size: 1.5rem;
        font-weight: bold;
    }
    body {
        display: flex;
        align-items: center;
        height: 90vh;
    }
</style>

<body class="anim">
    <div class="container mt-5 p-4" style="background-color:cornflowerblue; border-radius : 25px;">
        <form method="post" novalidate>
            <div class="row m-0 gap-3">
                <div class="col-sm p-0">
                    <label for="nom" class="form-label">Nom:</label><span class="text-light ms-1"><?= $errors["lastname"] ?? "" ?></span>
                    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" require name="lastname" value="<?= $_POST['lastname'] ?? "" ?>">
                </div>
                <div class="col-sm p-0">
                    <label for="prenom" class="form-label">Prénom</label><span class="text-light ms-1"><?= $errors["firstname"] ?? "" ?></span>
                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre prénom" require name="firstname" value="<?= $_POST['firstname'] ?? "" ?>">
                </div>
                    <div class="col-sm p-0">
                    <label for="Pseudo" class="form-label">Pseudo</label><span class="text-light ms-1"><?= $errors["pseudo"] ?? "" ?></span>
                    <input type="text" class="form-control" id="prenom" placeholder="Entrez votre Pseudo" require name="pseudo" value="<?= $_POST['pseudo'] ?? "" ?>">
                
                </div>

            </div>
            <div>
                <label for="email" class="form-label">Email</label><span class="text-light ms-1"><?= $errors["email"] ?? "" ?></span>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" require name="email" value="<?= $_POST['email'] ?? "" ?>">
            </div>
            <div class="row m-0 gap-3">
                <div class="col-sm p-0">
                    <label for="mdp" class="form-label">Mot de passe</label><span class="text-light ms-1"><?= $errors["password"] ?? "" ?></span>
                    <input type="password" class="form-control" id="mdp" placeholder="Entrez votre mot de passe" require name="password" value="<?= $_POST['password'] ?? "" ?>">
                </div>
                <div class="col-sm p-0">
                <label for="mdp2" class="form-label">Mot de passe</label><span class="text-light ms-1"><?= $errors["passwordconfirm"] ?? "" ?></span>
                    <input type="password" class="form-control" id="mdp2" placeholder="Confirmez votre mot de passe" require name="passwordconfirm" value="<?= $_POST['firstname'] ?? "" ?>">
                    
                </div>
            </div>
            <div class="row m-0 gap-3">
                <div class="col-sm p-0">
                    <label for="date_naissance" class="form-label">Date de naissance</label><span class="text-light ms-1"><?= $errors["naissance"] ?? "" ?></span>
                    <input type="date" class="form-control" id="date_naissance" require name= "naissance">
                </div>
                <div class="col-sm p-0">
                    <label class="form-label">Genre</label><span class="text-light ms-1"><?= $errors["genre"] ?? "" ?></span>
                    <select class="form-select" name="genre" require>
                        <option value="">Selectionnez</option>
                        <option value="homme">Homme</option>
                        <option value="femme">Femme</option>
                    </select>
                </div>
            </div>
            <div class="form-check d-flex justify-content-center align-items-center m-3">
                <input type="checkbox" class="form-check-input" id="conditions" require>
                <label class="form-check-label mx-2" for="conditions">J'accepte les conditions d'utilisation</label>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <button type="" class="btn btn-primary ">Inscrire</button>
            <a href=" ../Controller/controller-connexion.php" class="btn btn-secondary">Retour</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>