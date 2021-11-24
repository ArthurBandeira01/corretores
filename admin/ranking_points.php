<?php
    if(isset($_POST['pontuar'])){
        include_once('../config.php');
        $pontos = $_POST['pontos'];
        $id = $_POST['id'];
        $sqlPontos = "UPDATE ranking SET pontuacao = '$pontos' WHERE codigo_corretor = '$id'";
        $resultPontos = $conn->query($sqlPontos);
    }
    header('Location: ranking_edit.php');
?>