<?php include_once '../../templates/header.php' ?>

<?php include_once '../../templates/navbar.php' ?>

<main class="row flex-column align-items-center justify-content-center m-0 gap-2 mt-2">
    <form action="" method="post" enctype="multipart/form-data" class="mb-3 col-lg-6 col-12">
        <div>
            <label for="formFile" class="form-label">Ajouter une photo</label>
            <input class="form-control" type="file" id="photo" name="photo">
        </div>
        <div class="form-floating mt-2">
            <textarea class="form-control" placeholder="Ajouter un commentaire" id="description" style="height: 100px" name="description"></textarea>
            <label for="description">Commentaire</label>
        </div>
        <button class="btn btn-primary col-lg-2 col-8">Ajouter la photo</button>
        
    </form>
</main>

<?php include_once '../../templates/footer.php' ?>