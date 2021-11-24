<?php
    if(isset($_POST['editar_termo'])){
        if(isset($_FILES['termo'])){
            include_once('../config.php');
            $termo = $_FILES['termo'];
            if($termo['error']) die("Falha ao enviar arquivo");
            
            $pastaTermo = "assets/images/termos/";
            $nomeTermo = $termo['name'];
            $novoNomeTermo = uniqid();
            $extensaoTermo = strtolower(pathinfo($nomeTermo, PATHINFO_EXTENSION));
    
            $pathTermo = $pastaTermo . $novoNomeTermo . "." . $extensaoTermo;
            $termo_correto = move_uploaded_file($termo["tmp_name"], $pathTermo);

            $sqlEdit = "UPDATE termos SET termo = '$nomeTermo', path_termo = '$pathTermo' WHERE id = 1";
            $result = $conn->query($sqlEdit);
            header('Location: termos_edit.php');
        }
    }
?>