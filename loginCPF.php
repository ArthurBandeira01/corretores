<?php
session_start();
    //Testa requisição:
    //print_r($_REQUEST);

    if(isset($_POST['logarCPF']) && !empty($_POST['userCPF']) && !empty($_POST['passCPF'])){
        //Acessa sistema:
        include_once('config.php');
        $userCPF = $_POST['userCPF'];
        $passCPF = $_POST['passCPF'];

        //Usuários CPF:
        $sqlCPF = "SELECT * FROM usuarios_cpf WHERE email = '$userCPF' and senha = '$passCPF'";
        $resultCPF = $conn->query($sqlCPF);

        if(mysqli_num_rows($resultCPF) == 1){
            $_SESSION['userCPF'] = $userCPF;
            $_SESSION['passCPF'] = $passCPF;
            header('Location: admin/index.php');
        }else{
            unset($_SESSION['userCPF']);
            unset($_SESSION['passCPF']);
            header('Location: login.php');
        }
    }else{
        //Nega acesso:
        header('Location: login.php');
    }

?>