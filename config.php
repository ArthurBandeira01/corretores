<?php
//Config de conexão com o banco de dados:
    /*$servidor = 'localhost';
    $banco = 'corretores';
    $usuario = 'root';
    $senha = '';*/

    $servidor = 'localhost';
    $banco = 'alph9951_corretores';
    $usuario = 'alph9951_corretor';
    $senha = 'Corretores-2021';
    $conn = new mysqli($servidor, $usuario, $senha, $banco);
    //$conn = mysqli_connect($servidor, $usuario, $senha, $banco);
    //$db = mysqli_select_db($banco, $link);
    if(!$conn){
        die("Conexão falhou: " . mysqli_connect_erro());
    }/*else{
        echo "Conexão bem sucedida";
    }*/
//Fim conexão com BD


?>