<?php session_start(); 
include('header.php'); 
include_once('config.php');
    if((!isset($_SESSION['userCPF']) == true) && (!isset($_SESSION['passCPF']) == true)){
        unset($_SESSION['userCPF']);
        unset($_SESSION['passCPF']);
        header('Location: login.php');
    }
    $logadoCPF = $_SESSION['userCPF'];

    if(isset($_POST['solicitar'])){
        $msgCorretor = "";
        $msgCompra = "";
        $msgProdutor = "";
        $msgNota = "";
        $msgGTA = "";

        $nomeCorretor = "";
        $nomeProdutor = "";
        $nomeComprador = "";
        $nota = "";
        $gta = "";

        //Válida campos corretor, produtor e comprador:
        if(isset($_POST['nomeCorretor']) && strlen($_POST['nomeCorretor']) >= 5 && strlen($_POST['nomeCorretor']) <= 50 && !is_numeric($_POST['nomeCorretor'])){
            $nomeCorretor = $_POST['nomeCorretor'];
        }else{
            $msgCorretor = '<div class="invalido">Nome inválido!</div>'; 
        }
        if(isset($_POST['nomeProd']) && strlen($_POST['nomeProd']) >= 5 && strlen($_POST['nomeProd']) <= 50 && !is_numeric($_POST['nomeProd'])){
            $nomeProdutor = $_POST['nomeProd'];
        }else{
            $msgProdutor = '<div class="invalido">Nome inválido!</div>'; 
        }
        if(isset($_POST['nomeComp']) && strlen($_POST['nomeComp']) >= 5 && strlen($_POST['nomeComp']) <= 50 && !is_numeric($_POST['nomeComp'])){
            $nomeComprador = $_POST['nomeComp'];
        }else{
            $msgCompra = '<div class="invalido">Nome inválido!</div>'; 
        }
        
        //Valida GTA e NF-e:
        if(isset($_FILES['guia'])){
            $guia = $_FILES['guia'];
            if($guia['error']) die("Falha ao enviar arquivo");
            if($guia['size'] > 25000000) die('Arquivo maior que 20MB!');
            
            $pastaGuia = "assets/images/update/guia/";
            $nomeGuia = $guia['name'];
            $novoNomeGuia = uniqid();
            $extensaoGuia = strtolower(pathinfo($nomeGuia, PATHINFO_EXTENSION));

            if($extensaoGuia != "jpg" && $extensaoGuia != "png"){
                die("Tipo de arquivo não aceito!");
            }else{
                $pathGuia = $pastaGuia . $novoNomeGuia . "." . $extensaoGuia;
                $guia_correta = move_uploaded_file($guia["tmp_name"], $pathGuia);
            } 

        }else{
            $msgGTA = '<div class="invalido">GTA inválida!</div>';
        }

        if(isset($_FILES['nota'])){
            $nota = $_FILES['nota'];
            if($nota['error']) die("Falha ao enviar arquivo");
            if($nota['size'] > 25000000) die('Arquivo maior que 20MB!');
            
            $pastaNota = "assets/images/update/nota/";
            $nomeNota = $nota['name'];
            $novoNomeNota = uniqid();
            $extensaoNota = strtolower(pathinfo($nomeNota, PATHINFO_EXTENSION));

            if($extensaoNota != "jpg" && $extensaoNota != "png"){
                die("Tipo de arquivo não aceito!");
            }else{
                $pathNota = $pastaNota . $novoNomeNota . "." . $extensaoNota;
                $nota_correta = move_uploaded_file($nota["tmp_name"], $pathNota);
            } 
        }else{
            $msgNota = '<div class="invalido">Nota inválida!</div>';
        }

        if(!$msgCompra && !$msgProdutor && !$msgGTA && !$msgNota){
            $result = mysqli_query($conn, "INSERT INTO negociacao(corretor, nome_prod, nome_comp, gta, nota_fiscal, path_nota, path_gta) 
            VALUES ('$nomeCorretor', '$nomeProdutor', '$nomeComprador', '$nomeGuia', '$nomeNota', '$pathNota', '$pathGuia')");
            echo '<div class="cadastrado" id="btnCadastrado"><i class="far fa-check-circle"></i> Pontuação solicitada com sucesso</div>';
        }else{
            echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
        }
    }else{
        echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
    }
?>

<div class="form-ranking mt-5">
    <div class="container">
        <div class="login-text">
            <h3 class="title text-center mt-4 mb-3">Envie sua negociação para gerar pontos no ranking e competir com os melhores corretores do Brasil</h3>
        </div><!--login-text-->
        <form action="solicita.php" method="post" enctype="multipart/form-data" class="form-ranking-single mt-5">
            <div class="row">
                <div class="col">
                    <label for="corretor" class="form-label">Nome do corretor</label>
                    <input type="text" class="form-control" name="nomeCorretor" id="corretor" maxlength="50" aria-describedby="corretorHelp" required>
                    <div id="corretorHelp" class="form-text">Ex.: Guilherme Paes</div>
                    <?php if(isset($msgCorretor)) echo $msgCorretor ?>
                </div><!--col-->
            </div><!--row-->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nomeProd" class="form-label">Nome produtor rural</label>
                    <input type="text" class="form-control" name="nomeProd" id="nomeProd" maxlength="50" aria-describedby="prodHelp" required>
                    <div id="prodHelp" class="form-text">Ex.: João Barreto</div>
                    <?php if(isset($msgProdutor)) echo $msgProdutor ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="nomeComp" class="form-label">Nome Comprador</label>
                    <input type="text" name="nomeComp" class="form-control" id="nomeComp" maxlength="50" aria-describedby="compHelp" required>
                    <div id="compHelp" class="form-text">Ex.: Maria Lisboa</div>
                    <?php if(isset($msgCompra)) echo $msgCompra ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="guia" class="form-label">Guia do Trânsito Animal (GTA)</label>
                    <input type="file" class="form-control" name="guia" id="guia" aria-describedby="guiaHelp" required>
                    <div id="guiaHelp" class="form-text">Insira sua GTA aqui</div>
                    <?php if(isset($msgGTA)) echo $msgGTA ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="nota" class="form-label">Nota Fiscal Eletrônica (NF-e)</label>
                    <input type="file" class="form-control" name="nota" id="nota" maxlength="50" aria-describedby="notaHelp" required>
                    <div id="notaHelp" class="form-text">Insira o número da sua nota aqui para conferência</div>
                    <?php if(isset($msgNota)) echo $msgNota ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col text-center mt-4">
                <input type="submit" value="Solicitar pontuação" class="btn input-logar" name="solicitar">
                </div><!--col-->
            </div><!--row-->
        </form><!--form-ranking-single-->
    </div><!--container-->
</div><!--form-ranking-->
    
    
<?php include('footer.php'); ?>
<!--script-->
<script src="assets/js/login.js"></script>
<script src="assets/js/cadastra.js"></script>
<!--fim script-->