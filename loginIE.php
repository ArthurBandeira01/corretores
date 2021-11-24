<?php
session_start();
    //Testa requisição:
    //print_r($_REQUEST);

    if(isset($_POST['logarIE']) && !empty($_POST['userIE']) && !empty($_POST['passIE'])){
        //Acessa sistema:
        include_once('config.php');
        $userIE = $_POST['userIE'];
        $passIE = $_POST['passIE'];

        //Usuários CNPJ:
        $sqlIE = "SELECT * FROM usuarios_ie WHERE email = '$userIE' and senha = '$passIE'";
        $resultIE = $conn->query($sqlIE);

        if(mysqli_num_rows($resultIE) == 1){
            $_SESSION['userIE'] = $userIE;
            $_SESSION['passIE'] = $passIE;
            header('Location: admin/index.php');
        }else{
            unset($_SESSION['userIE']);
            unset($_SESSION['passIE']);
            header('Location: login.php');
        }
    }else{
        //Nega acesso:
        header('Location: login.php');
    }

?>