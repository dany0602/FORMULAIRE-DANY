<?php include_once '../../templates/header.php' ?>

<body>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
        }

        .formulaire {
            min-width: 30vw;
            min-height: 30vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin: 0 auto;
            background-color: cornflowerblue;
            border-radius: 25px;
            padding: 2rem;
        }

        .button {
            display: flex;
            gap: 2rem;
        }

        label {
            width: 20rem;
        }

        input {
            width: 20rem;
        }
    </style>

    <form method="post" class="formulaire">

            <label for="username"> Email :
                <input type="text" name="email" id="username">
            </label>
            <span class="text-light ms-1"><?= $errors['email'] ?? "" ?></span>
            <label for="password"> Mot de passe : 
                <input type="password" name="password" id="password">
            </label>
            <span class="text-light ms-1"><?= $errors["password"] ?? "" ?></span>

            <div class="button">
                <button class="btn btn-primary" type="submit">Connexion</button>
                <a href="../Controller/controller-inscription.php" class="btn btn-secondary">Inscription</a>
            </div>
            <div>
                <span><?= $errors['connexion'] ?? "" ?></span>
            </div>

    </form>


    <script src="https://kit.fontawesome.com/f9a12e2310.js" crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>