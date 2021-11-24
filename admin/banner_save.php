<?php
    include_once('../config.php');

    if(isset($_POST['bannerUpdate'])){
        $id = $_POST['id'];
        //Banner:
        if(isset($_FILES['banner'])){
            $banner = $_FILES['banner'];
            if($banner['error']) die("Falha ao enviar arquivo");
            
            $pastaBanner = "assets/images/banners/";
            $nomeBanner = $banner['name'];
            $novoNomeBanner = uniqid();
            $extensaoBanner = strtolower(pathinfo($nomeBanner, PATHINFO_EXTENSION));
            $pathBanner = $pastaBanner . $novoNomeBanner . "." . $extensaoBanner;
            $banner_correto = move_uploaded_file($banner["tmp_name"], $pathBanner);
        }

        //Aqui acontece o UPDATE:
        $sqlUpdate = "UPDATE banners SET banner='$nomeBanner', path_banner='$pathBanner' WHERE id = $id";

        $result = $conn->query($sqlUpdate);
    }
    header('Location: banners_edit.php');
?>