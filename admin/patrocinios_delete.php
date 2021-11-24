<?php

include_once('../config.php');

if(!empty($_GET['id'])){
    //Variável de erro caso tenho campos inválidos no cadastro:
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM patrocinios WHERE id=$id";

    $result = $conn->query($sqlSelect);
    if($result->num_rows > 0){
        $sqlDelete = "DELETE FROM patrocinios WHERE id=$id";
        $resultDelete = $conn->query($sqlDelete);
    }
    header('Location: patrocinios.php');
}else{
    header('Location: patrocinios.php');
}

?>