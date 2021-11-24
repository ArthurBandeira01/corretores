<?php
    include_once('../config.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $nomeCPF = $_POST['nome'];
        $emailCPF = $_POST['email'];
        $cpf = $_POST['cpf'];
        $enderecoCPF = $_POST['endereco'];
        $cidadeCPF = $_POST['cidadeCPF'];
        $estadoCPF = $_POST['estadoCPF'];
        $celularCPF = $_POST['celular'];
        $telefoneCPF = $_POST['telefone'];
        $passwordCPF = $_POST['password'];  

        //Aqui acontece o UPDATE:
        $sqlUpdate = "UPDATE usuarios_cpf SET nome='$nomeCPF',email='$emailCPF',cpf='$cpf',endereco='$enderecoCPF',cidade_cpf='$cidadeCPF',
        estado_cpf='$estadoCPF',celular='$celularCPF',telefone='$telefoneCPF',senha='$passwordCPF' WHERE id = $id";

        $result = $conn->query($sqlUpdate);
    }
    header('Location: index.php');
?>