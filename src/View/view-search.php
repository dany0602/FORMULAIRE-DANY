<?php include_once '../../templates/header.php' ?>

<?php include_once '../../templates/navbar.php' ?>

<main class="row flex-column align-items-center justify-content-center m-0 gap-2 mt-2">
<form action="" class="d-flex col-lg-6 col-10 gap-2">

    <input class="form-control" type="text" placeholder="Rechercher un utilisateur" name="user">
    <button class="btn btn-primary">Rechercher</button>
</form>


<div class="container d-flex justify-content-center mt-4">

    <div class="row row-cols-3 gap-2 justify-content-center">

        <?php foreach ($searchPosts as $post) { ?>
            <a href="controller-onepost.php?post=<?= $post['post_id'] ?>" class="col-lg-3">
                <img src="../../assets/img/users/<?= $_SESSION['user_id']?>/<?= $post['pic_name'] ?>" alt="" class="col-12">
            </a>
        <?php } ?>

    </div>
</div>
</main>

<?php include_once '../../templates/footer.php' ?>