<?php include_once '../../templates/header.php' ?>

<?php include_once '../../templates/navbar.php' ?>


<main class="d-flex flex-column align-items-center mt-4 mx-auto" style="max-width: 800px;">


    <div class="d-flex flex-column align-self-start py-4">
        <a href=""><?= $uniquePost['user_pseudo'] ?></a>
        <span>28/10/2015</span>
    </div>

    <img src="../../assets/img/users/<?= $uniquePost['user_id'] ?>/<?= $uniquePost['pic_name'] ?>" alt="" style="max-width: 750px;">
    <div class="d-flex flex-column align-self-start px-4"  style="width: 100%;">
        <span class="py-1"><?= $uniquePost['post_description'] ?></span>

        <div class="px-2 py-2 d-flex flex-column">
        <?php foreach ($allComments as  $value) { ?> 
         
            <b><?= $value['user_pseudo'] ?></b>
            <span><?= $value['com_text'] ?></span>

            <?php } ?> 
        </div>


        <div class="p-1 py-4">

            <form method="post">
                <div class="mb-1">
                    <label for="comment" class="form-label">Ajouter un commentaire</label>
                    <input type="text" class="form-control" id="comment" name="comment">
                    <div id="errors" class="form-text text-danger"><?= $errors['comment'] ?? "" ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</main>









<?php include_once '../../templates/footer.php' ?>