<?php session_start(); 
include_once('../config.php');
    if((!isset($_SESSION['userCPF']) == true) && (!isset($_SESSION['passCPF']) == true)){
        unset($_SESSION['userCPF']);
        unset($_SESSION['passCPF']);
        header('Location: ../login.php');
    }
    $logadoCPF = $_SESSION['userCPF'];
    
    if(isset($_POST['comentar'])){
        $msgNome = "";
        $msgComentario = "";
        
        $nome = "";
        $comentario = "";
        $foto = "";

        //Verifica campo nome e comentário:
        if(isset($_POST['nome']) && strlen($_POST['nome']) >= 5 && strlen($_POST['nome']) <= 50 && !is_numeric($_POST['nome'])){
            $nome = $_POST['nome'];
        }else{
            $msgNome = '<div class="invalido">Nome inválido!</div>';
        }
        if(isset($_POST['comentario']) && strlen($_POST['comentario']) >= 10){
            $comentario = $_POST['comentario'];
        }else{
            $msgComentario = '<div class="invalido">Comentário inválido!</div>';
        }
        //Foto:
        if(isset($_FILES['foto'])){
            $foto = $_FILES['foto'];
            if($foto['error']) die("Falha ao enviar arquivo");
            
            $pastaFoto = "assets/images/depoimentos/";
            $nomeFoto = $foto['name'];
            $novoNomeFoto = uniqid();
            $extensaoFoto = strtolower(pathinfo($nomeFoto, PATHINFO_EXTENSION));
    
            $pathFoto = $pastaFoto . $novoNomeFoto . "." . $extensaoFoto;
            $foto_correto = move_uploaded_file($foto["tmp_name"], $pathFoto);
        }
        if(!$msgNome && !$msgComentario){
            $result = mysqli_query($conn, "INSERT INTO depoimentos(nome, comentario, foto, path_foto) 
            VALUES ('$nome', '$comentario', '$nomeFoto', '$pathFoto')");
            echo '<div class="cadastrado" id="btnCadastrado"><i class="far fa-check-circle"></i> Comentário Adicionado!</div>';
        }else{
            echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
        } 
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Corretores de Gado - Entre e cadastre-se">
    <meta name="keywords" content="corretor, gado, pecuária, agronegócio, rural, leis">
    <meta name="author" content="Corretores de Gado">
    <script src="https://kit.fontawesome.com/a7cf753026.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../assets/plugins/swiper/swiper.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="assets/css/painel.css">
    <title>Corretores de Gado</title>
</head>
<body>
    <!-- conteúdo lateral do site -->
<div class="conteudo-painel">
    <input type="checkbox" name="" id="nav-toggle">
    <aside class="aside">
        <div class="logo-painel">
            <div class="logo-toggle">
                <a href="index.php" class="logo-link-toggle">
                    <img class="toggle-img" src="assets/images/logo/painel.png" alt="Corretores de Gado"
                    title="Corretores de Gado">
                </a><!--logo-link-toggle-->
            </div><!--logo-toggle-->
            <a href="index.php" class="link-logo-painel">
                <img class="logo-painel-img" src="assets/images/logo/logo1.1.png" alt="Corretores de Gado"
                title="Corretores de Gado">
            </a><!--link-logo-painel-->
        </div><!--logo-->

        <div class="dashboard-painel mt-4">
            <ul class="dashboard-sidebar mt-5">
                <li class="link-item">
                    <a href="../index.php" class="dashboard-links">
                        <i class="fas fa-home"></i>
                        <span> Home</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="usuarios_edit.php" class="dashboard-links">
                        <i class="fas fa-user"></i> 
                        <span> Usuários</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="banners_edit.php" class="dashboard-links">
                        <i class="far fa-images"></i>
                        <span> Banners</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="banners_edit.php" class="dashboard-links">
                        <i class="far fa-images"></i>
                        <span> Banners</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="patrocinios.php" class="dashboard-links">
                        <i class="far fa-handshake"></i>
                        <span> Patrocínios</span>
                    </a><!--dashboard-links-->
                </li><!--link-item--> 
                <hr class="separa-link">
                <li class="link-item">
                    <a href="blog_edit.php" class="dashboard-links">
                        <i class="far fa-newspaper"></i>
                        <span> Blog</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="ranking_edit.php" class="dashboard-links">
                        <i class="fas fa-medal"></i>
                        <span> Ranking</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="cotacao_edit.php" class="dashboard-links">
                        <i class="fas fa-dollar-sign"></i>
                        <span> Cotações</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="depoimento.php" class="dashboard-links">
                        <i class="far fa-comment"></i>
                        <span> Depoimentos</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
                <li class="link-item">
                    <a href="termos_edit.php" class="dashboard-links">
                        <i class="far fa-file-alt"></i>
                        <span> Ser corretor</span>
                    </a><!--dashboard-links-->
                </li><!--link-item-->
                <hr class="separa-link">
            </ul><!--dashboard-sidebar-->
        </div><!--dashboard-painel-->

        <div class="aside-direitos">
            <p class="text-center text-white">Corretores de Gado - Todos os direitos reservados ©</p>
        </div><!--aside-direitos-->
    </aside><!--aside-->
    <!--mobile-->
    <div class="main-content">
            <header class="mobile-painel d-flex justify-content-between align-items-center">
                    <h3 class="icone-mobile mt-2">
                        <label class="pointer-icone" for="nav-toggle">
                            <i class="fas fa-bars"></i> Painel
                        </label>
                    </h3><!--icone-mobile-->
                    <div class="user-wrapper">
                        <img src="assets/images/usuarios/user.png" alt="" class="user-profile mt-1">
                        <span class="name-user ms-2"><?php echo $logadoCPF ?></span>
                    </div><!--user-wrapper-->
                    <div class="logout me-3">
                        <a href="logout.php" class="logout-link">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </a><!--logout-->
                    </div><!--logout-->
            </header><!--mobile-->

            <main class="principal-painel">
                <div class="lista-usuarios">
                    <h2 class="title mb-5 text-center"><i class="fas fa-plus-circle"></i> Adicionar Depoimento</a></h2>
                   <form action="depoimento_edit.php" method="post" enctype="multipart/form-data" class="form-depoimento">
                        
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nome" class="form-label">Nome e Sobrenome:</label>
                                <input type="text" class="form-control" name="nome" id="nome" maxlength="50" aria-describedby="nomeHelp" required>
                                <div id="nomeHelp" class="form-text">Insira o nome do usuário</div>
                                <?php if(isset($msgNome)) echo $msgNome; ?>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col mb-3">
                                <textarea class="form-control text-comentario" name="comentario" placeholder="Insira o comentário aqui..." id="floatingTextarea" required></textarea>
                                <?php if(isset($msgComentario)) echo $msgComentario; ?>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col mb-3">
                                <label for="foto" class="form-label">Insira uma foto:</label>
                                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="fotoHelp" required>
                                <div id="fotoHelp" class="form-text">Foto do usuário</div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                            <input type="submit" value="Adicionar Comentário" class="btn input-logar" name="comentar">
                            </div><!--col-->
                        </div><!--row-->
                   </form><!--form-depoimento-->
                </div><!--lista-usuarios-->
            </main><!--principal-->
        </div><!--main--content-->
        <!--fim mobile-->
    <!--fim aside-->
</div><!--conteudo-painel-->

<!--scripts-->
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/popper.js"></script>
<script src="../assets/js/botao-subir.js"></script>
<script src="../assets/js/cadastra.js"></script>
<!--fim scripts-->

</body>
</html>
