<!DOCTYPE html>
<html>
    <head>
        <?php
        require('View/link/header.php');
        ?>

        <title></title>
    </head>
    <body>

        <form  action="" method="POST" enctype="multipart/form-data">
            <div class="custom-file shadow">
                <input type="file" id="photo" class="input-file custom-file-input mr-5" name="photo" accept="image/*" />
                <label for="photo" class="btn btn-tertiary js-labelFile custom-file-label d-flex justify-content-start">
                    <i class="far fa-image mr-2 mt-1"></i>
                    <span class="js-fileName mt-1 text-primary"><?= $routeDescription->photo; ?></span>
                </label>
                <div>
                    <img src="../asset/route-img/<?= (isset($routeDescription->photo)) ? $routeDescription->photo : 'photo.svg'; ?>" id="profile-img-tag" class="shadow p-1 bg-white rounded img-fluid mt-3 w-25" />
                </div>
            </div>
        </form>

<input type="file" id="postPicture" class="input-file" name="postPicture" accept="image/png, image/jpeg" />
                            <label for="postPicture" class="btn btn-tertiary js-labelFile">
                                <i class="fas fa-cloud-upload-alt mr-2 pt-5"></i>
                                <span class="js-fileName pt-5">Insérer une image<span class="text-bilm-red">*</span></span>
                                <img src="<?= (isset($post->post_picture)) ? $post->post_picture : ''; ?>" id="profile-img-tag" class="img-fluid pl-4 pr-4 pb-4 w-100" />
                            </label>




        <script src="../assets/js/js.js"></script>
        <?php
        require('View/link/script.php');
        ?>

    </body>
</html>
