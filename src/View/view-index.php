<?php include_once "../../templates/header.php" ?>
<?php include_once "../../templates/navbar.php" ?>


<main class="row flex-column align-items-center justify-content-center m-0 gap-2 mt-2">

    <?php foreach ($allPosts as $value) {
        // var_dump($allPosts);
    ?>
        <div class="col-lg-3 d-flex flex-column border">
            <div class="d-flex justify-content-between p-2">
                <span><?= $value['user_pseudo'] ?></span>
                <span><?= date("d/m/Y - H:i", $value['post_timestamp']) ?></span>
            </div>
            <img src="../../assets/img/users/<?= $value["user_id"] ?>/<?= $value["pic_name"] ?>" class="card-leg-top" alt="...">
            <div class="d-flex gap-2 mt-1">
                <i class="bi bi-heart"></i>
                <i class="bi bi-chat"></i>
            </div>
            <span class="p-2">Afficher les 10 commentaires</span>
            <span class="p-2">Ajouter un commentaire</span>
        </div>
    <?php } ?>



    <!-- <div class="col-lg-3 d-flex flex-column border">
        <div class="d-flex justify-content-between p-2">
            <span>pseudo</span>
            <span>date</span>
        </div>
        <img src="../../assets/img/users/10/beautemps.png" alt="">
        <i class="bi bi-heart-fill"></i>
        <i class="bi bi-chat"></i>
        <span class="p-2">Ajouter une description</span>
        <span class="p-2">Ajouter un commentaire</span>
    </div>

    <div class="col-lg-3 d-flex flex-column border">
        <div class="d-flex justify-content-between p-2">
            <span>pseudo</span>
            <span>date</span>
        </div>
        <img src="../../assets/img/users/10/beautemps.png" alt="">

        <i class="bi bi-chat"></i>
        <i class="bi bi-heart-fill"></i>
        <span class="p-2">Ajouter une description</span>
        <span class="p-2">Ajouter un commentaire</span>
    </div> -->

</main>











<?php include_once "../../templates/footer.php" ?>