<?php include_once '../../templates/header.php' ?>



<body class="">

    <style>
        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
        }

        .formulaire {
            min-width: 30vw;
            min-height: 25vh;
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

        .text {
            font-size: 1.5rem;
        }
    </style>
    <div class="formulaire">

        <h1 class="mx-auto text">Merci de votre inscription ! Vous pouvez
            dorénavant vous <a href="../Controller/controller-connexion.php"> connecter.</a> <span>😊</span> </h1>
    </div>
</body>

</html>