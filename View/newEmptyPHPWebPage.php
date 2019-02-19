<?php

//verifications sur le type de fichier upload
//spécifie le dossier dans lequel les images sont stockées 
// Vérifie si chaque image est bien un fichier image ou du fake 
if (isset($_FILES['event_picture'])) {
    $target_dir = "img/";
//spécifie le chemin du fichier à être chargé 
    $target_file = $target_dir . basename($_FILES['event_picture']['name']);
//spécifie l'extension du fichier 
    $imageFileType = strtolower(pathinfo($_FILES['event_picture']['name'], PATHINFO_EXTENSION));
// Vérifie si le nom du fichier existe déjà dans la bdd 
    if (file_exists($target_file)) {
        $errorsArrayevent['event_picture'] = 'Le fichier existe déjà';
    }
// Vérifie le poids du fichier 
    if ($_FILES["event_picture"]["size"] > 500000) {
        $errorsArrayevent['event_picture'] = 'L\'image ne doit pas accéder 500kb';
    }

    $arrayValidFormat = ["jpg", "png", "jpeg", "bmp"]; // Prise en compte de certains formats de fichiers 
//création d'un tableau et si dans ce tableau on compare le fichier à uploadé et les formats autorisés 
    if (!in_array($imageFileType, $arrayValidFormat)) {
        $errorsArrayevent['event_picture'] = 'Le format du fichier n\'est pas autorise.(jpg, jpeg, png ou bmp) ';
    }
}

if (count($errorsArrayevent) == 0) {
    if (move_uploaded_file($_FILES["event_picture"]["tmp_name"], 'img/' . $_FILES["event_picture"]["name"])) {
        echo "le fichier " . basename($_FILES["event_picture"]["name"]) . " a été chargé.";
    } else {
        echo "désolé, il y a une erreur de chargement de fichier.";
    }
}
//pour que l'image aille dans ton dossier image et pouvoir l'afficher






if (!array_key_exists('image', $_FILES) && isset($_POST['sendButton'])) {
    $errorsArray['image'] = 'Veuillez entrer une image';
}
if (isset($_FILES['image']['name'])) { // recherche donnée input 
//    $pductsObj->products_img =  strtolower(pathinfo(($_FILES['image']['name']),PATHINFO_EXTENSION));
//}
    $uploadOk = 1; //variable qui permet de mettre en place la verification sur l'image uploader
    $imageFileType = strtolower(pathinfo(($_FILES['image']['name']), PATHINFO_EXTENSION));


// vérification file size
    if ($_FILES['image']['size'] > 100000) {
        $errorsArray['image'] = ' le fichier chargé est trop lourd, veuillez selectionner une autre image. ';
        $uploadOk = 0;
    }

// verification du formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errorsArray['image'] = 'seulement les fichiers JPG, JPEG, PNG & GIF sont acceptés.';
        $uploadOk = 0;
    }
}





SELECT
`products_name`,
 `products_brand`,
 `products_quantity`,
 `products_state`,
 `products_capacity`,
 DATE_FORMAT(`products_expiration`, '%d/%m/%Y') AS 'expiration',
 `products_img`, `maincat_name`
FROM `velo_products`
INNER JOIN `velo_maincat`
ON `velo_products`.maincat_id = `velo_maincat`.maincat_id
WHERE `users_id` = 33 
        
        
        
SELECT `products_name`, 
        `products_brand`, 
        `products_quantity`, 
        `products_state`, 
        `products_capacity`, 
        DATE_FORMAT(`products_expiration`, '%d/%m/%Y') AS 'expiration', 
        `products_img`, 
        `maincat_name`, 
        `subcat_name` 
        FROM `velo_products` 
        INNER JOIN `velo_maincat` 
        ON `velo_products`.maincat_id = `velo_maincat`.maincat_id 
        INNER JOIN `velo_subcat` 
        ON `velo_products`.subcat_id = `velo_subcat`.subcat_id 
        WHERE `users_id` = 33 
        
        SELECT `products_name`,
        `products_brand`, 
        `products_quantity`, 
        `products_state`, 
        `products_capacity`, 
        DATE_FORMAT(`products_expiration`, '%d/%m/%Y') AS expiration, 
        `products_img`, 
        `maincat_name`, 
        `subcat_name` 
        FROM `velo_products` 
        INNER JOIN `velo_maincat` 
        ON `velo_products`.maincat_id = `velo_maincat`.maincat_id 
        INNER JOIN `velo_subcat` 
        ON `velo_products`.subcat_id = `velo_subcat`.subcat_id 
        WHERE `users_id` = 33 