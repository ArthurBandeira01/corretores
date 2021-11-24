<?php
    if(isset($_POST['atualizar'])){
        include_once('../config.php');

        $boi = $_POST['boi'];
        $vaca = $_POST['vaca'];
        $terneira = $_POST['terneira'];
        $terneiro = $_POST['terneiro'];
        $ovelha = $_POST['ovelha'];
        $cordeiro = $_POST['cordeiro'];
        $capao = $_POST['capao'];
        $carneiro = $_POST['carneiro'];
        $soja = $_POST['soja'];
        $arroz = $_POST['arroz'];
        $milho = $_POST['milho'];
        $trigo = $_POST['trigo'];

        $sqlCotacao = "UPDATE cotacao SET boi='$boi', vaca='$vaca',
        terneira='$terneira', terneiro='$terneiro', ovelha='$ovelha',
        cordeiro='$cordeiro', capao='$capao', carneiro='$carneiro', soja='$soja',
        arroz='$arroz', milho='$milho', trigo='$trigo' WHERE id = 1";

        $result = $conn->query($sqlCotacao);
    }
    header('Location: cotacao_edit.php');
?>