<?php session_start(); 
include_once('../config.php');
    if((!isset($_SESSION['userCPF']) == true) && (!isset($_SESSION['passCPF']) == true)){
        unset($_SESSION['userCPF']);
        unset($_SESSION['passCPF']);
        header('Location: ../login.php');
    }
    $logadoCPF = $_SESSION['userCPF'];
    
    $sqlCot = "SELECT * FROM cotacao";
    $resultCot = $conn->query($sqlCot);
    $user_data = mysqli_fetch_assoc($resultCot);
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
                    <h2 class="title mb-5 text-center"><i class="fas fa-funnel-dollar"></i> Cotações de animais e de grãos</h2>
                    
                    <form action="cotacaoSave.php" class="form-cotacao" id="cot" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="boi" class="form-label">Boi Gordo:</label>
                                <input type="text" class="form-control" name="boi" id="boi" maxlength="50" aria-describedby="boiHelp" required>
                                <div id="boiHelp" class="form-text">Valor atual: R$ <?php echo $user_data['boi']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="vaca" class="form-label">Vaca de Invernar:</label>
                                <input type="text" class="form-control" name="vaca" id="vaca" maxlength="50" aria-describedby="vacaHelp" required>
                                <div id="vacaHelp" class="form-text">Valor atual: R$ <?php echo $user_data['vaca']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="terneira" class="form-label">Terneira:</label>
                                <input type="text" name="terneira" class="form-control" id="terneira" maxlength="50" aria-describedby="terneiraHelp" required>
                                <div id="terneiraHelp" class="form-text">Valor atual: R$ <?php echo $user_data['terneira']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="terneiro" class="form-label">Terneiro:</label>
                                <input type="text" name="terneiro" class="form-control" id="terneiro" maxlength="50" aria-describedby="terneiroHelp" required>
                                <div id="terneiroHelp" class="form-text">Valor atual: R$ <?php echo $user_data['terneiro']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="ovelha" class="form-label">Ovelha:</label>
                                <input type="text" class="form-control" name="ovelha" id="ovelha" aria-describedby="ovelhaHelp" required>
                                <div id="ovelhaHelp" class="form-text">Valor atual: R$ <?php echo $user_data['ovelha']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="cordeiro" class="form-label">Cordeiro:</label>
                                <input type="text" class="form-control" name="cordeiro" id="cordeiro" maxlength="50" aria-describedby="cordeiroHelp" required>
                                <div id="cordeiroHelp" class="form-text">Valor atual: R$ <?php echo $user_data['cordeiro']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="capao" class="form-label">Capão:</label>
                                <input type="text" class="form-control" name="capao" id="capao" maxlength="50" aria-describedby="capaoHelp" required>
                                <div id="capaoHelp" class="form-text">Valor atual: R$ <?php echo $user_data['capao']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="carneiro" class="form-label">Carneiro:</label>
                                <input type="text" maxlength="50" class="form-control" name="carneiro" id="carneiro" aria-describedby="carneiroHelp" required>
                                <div id="carneiroHelp" class="form-text">Valor atual: R$ <?php echo $user_data['carneiro']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="soja" class="form-label">Soja:</label>
                                <input type="text" name="soja" class="form-control" id="soja" maxlength="50" aria-describedby="sojaHelp" required>
                                <div id="sojaHelp" class="form-text">Valor atual: R$ <?php echo $user_data['soja']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="arroz" class="form-label">Arroz:</label>
                                <input type="text" name="arroz" class="form-control" id="arroz" maxlength="50" aria-describedby="arrozHelp" required>
                                <div id="arrozHelp" class="form-text">Valor atual: R$ <?php echo $user_data['arroz']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="milho" class="form-label">Milho:</label>
                                <input type="text" name="milho" class="form-control" id="milho" maxlength="50" aria-describedby="milhoHelp" required>
                                <div id="milhoHelp" class="form-text">Valor atual: R$ <?php echo $user_data['milho']; ?></div>
                            </div><!--campo-->
                            <div class="col-md-6 mb-3">
                                <label for="trigo" class="form-label">Trigo:</label>
                                <input type="text" name="trigo" class="form-control" id="trigo" maxlength="50" aria-describedby="trigoHelp" required>
                                <div id="trigoHelp" class="form-text">Valor atual: R$ <?php echo $user_data['trigo']; ?></div>
                            </div><!--campo-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col text-center mt-4">
                                <input type="submit" value="Atualizar Cotação" class="btn input-logar" name="atualizar">
                            </div><!--col-->
                        </div><!--row-->
                    </form><!--form--->
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
<!--fim scripts-->

</body>
</html>
