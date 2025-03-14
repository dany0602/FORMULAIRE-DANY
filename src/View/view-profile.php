<?php include_once '../../templates/header.php' ?>

<?php include_once '../../templates/navbar.php' ?>

<div class="d-flex px-4 justify-content-center align-items-center gap-4 mt-4">
    <img src="../../assets/img/users/10/paysage.png" alt="" class="col-1 rounded-pill">
    <div class="d-flex flex-column">
        <span class="fs-2"><?= $_SESSION['user_pseudo']?></span>
        <span><b>2</b> publications</span>
        <span><b>4</b> followers</span>
        <span><b>6</b> suivi(e)s</span>
    </div>

    <div>
        <button class="btn btn-primary">Modifier profil</button>
    </div>
</div>


<div class="container d-flex justify-content-center mt-4">

    <div class="row row-cols-3">

        <?php foreach ($allPosts as $post) { ?>
            <img src="../../assets/img/users/<?= $_SESSION['user_id']?>/<?= $post['pic_name'] ?>" class="mt-3 object-fit-contain" alt="">
        <?php } ?>

    </div>
</div>

<?php include_once '../../templates/footer.php'; ?>