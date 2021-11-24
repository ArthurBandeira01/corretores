<?php include('header.php'); 
include('config.php');

if(isset($_POST['cadastrar'])){
    //Variável de erro caso tenho campos inválidos no cadastro:
    $erro = false;
    $msgNome = "";
    $msgEndereco = "";
    $msgCidade = "";
    $msgEstado = "";
    $msgEmail = "";
    $msgSenha = "";

        $nomeCPF = "";
        $emailCPF = "";
        $cpf = $_POST['cpf'];
        $enderecoCPF = "";
        $cidadeCPF = "";
        $estadoCPF = "";
        $celularCPF = $_POST['celular'];
        $telefoneCPF = $_POST['telefone'];
        $passwordCPF = "";   

            //Verifica campo nome:
            if(isset($_POST['nome']) && strlen($_POST['nome']) >= 5 && strlen($_POST['nome']) <= 50 && !is_numeric($_POST['nome'])){
                $nomeCPF = $_POST['nome'];
            }else{
                $msgNome = '<div class="invalido">Nome inválido!</div>';
            }

            //Verifica campo endereçoCPF:
            if(isset($_POST['endereco']) && strlen($_POST['endereco']) >= 5 && strlen($_POST['endereco']) <= 50){
                $enderecoCPF = $_POST['endereco'];
            }else{
                $msgEndereco = '<div class="invalido">Endereço inválido!</div>';
            }

            //Verifica campo cidadeCPF:
            if(isset($_POST['cidadeCPF']) && strlen($_POST['cidadeCPF']) >= 5 && strlen($_POST['cidadeCPF']) <= 50 && !is_numeric($_POST['cidadeCPF'])){
                $cidadeCPF = $_POST['cidadeCPF'];
            }else{
                $msgCidade = '<div class="invalido">Cidade inválida!</div>';
            }

            //Verifica campo estado:
            if(isset($_POST['estadoCPF']) && strlen($_POST['estadoCPF']) == 2 && !is_numeric($_POST['estadoCPF'])){
                $estadoCPFString = strval($_POST['estadoCPF']);
                $estadoCPFUpper = strtoupper($estadoCPFString);
                $estadoCPF = $estadoCPFUpper;
            }else{
                $msgEstado = '<div class="invalido">Estado inválido!</div>';
            }

            //Verifica e-mail:
            if(isset($_POST['email']) && strlen($_POST['email']) >= 5 && strlen($_POST['email']) <= 100){
                // Remove os caracteres ilegais, caso tenha
                $emailCPF = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                // Valida o e-mail
                if (filter_var($emailCPF, FILTER_VALIDATE_EMAIL)) {
                    $emailCPF = $_POST['email'];
                }else {
                    $msgEmail = '<div class="invalido">E-mail inválido!</div>';
                }
            }else{
                $msgEmail = '<div class="invalido">Preencha o campo e-mail</div>';
            }

            //Verifica senha:
            if(isset($_POST['password']) && strlen($_POST['password']) >= 5 && strlen($_POST['password']) <= 30){
                //$passwordCPF = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $passwordCPF = $_POST['password'];
            }else{
                $msgSenha = '<div class="invalido">Insira uma senha</div>'; 
            }
        
        if(!$msgNome && !$msgEmail && !$msgSenha && !$msgEndereco && !$msgCidade && !$msgEstado){
            $result = mysqli_query($conn, "INSERT INTO usuarios_cpf(nome, email, cpf, endereco, cidade_cpf, estado_cpf, celular, telefone, senha) 
            VALUES ('$nomeCPF', '$emailCPF', '$cpf', '$enderecoCPF', '$cidadeCPF', '$estadoCPF', '$celularCPF', '$telefoneCPF', '$passwordCPF')");
            echo '<div class="cadastrado" id="btnCadastrado"><i class="far fa-check-circle"></i> Cadastrado</div>';   
        }else{
            echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
        }
   // }
}

if(isset($_POST['cadastrarIE'])){
    //Variável de erro caso tenho campos inválidos no cadastro:
    $erro = false;
    $msgNomeEmpresa = "";
    $msgResponsavel = "";
    $msgEmailIE = "";
    $msgEstadoIE = "";
    $msgSenhaIE = "";

        $nomeEmpresa = "";
        $responsavel = "";
        $inscricao = $_POST['inscricao'];
        $emailIE = "";
        $cidadeIE = $_POST['cidadeIE'];
        $estadoIE = "";
        $celularIE = $_POST['celularIE'];
        $telefoneIE = $_POST['telefoneIE'];
        $passwordIE = "";

        //Verifica campo nome:
        if(isset($_POST['nomeEmpresa']) && strlen($_POST['nomeEmpresa']) >= 5 && strlen($_POST['nomeEmpresa']) <= 50 && !is_numeric($_POST['nomeEmpresa'])){
            $nomeEmpresa = $_POST['nomeEmpresa'];
        }else{
            $msgNomeEmpresa = '<div class="invalido">Nome inválido!</div>'; 
        }

        //Verifica campo responsável:
        if(isset($_POST['responsavel']) && strlen($_POST['responsavel']) >= 5 && strlen($_POST['responsavel']) <= 50){
            $responsavel = $_POST['responsavel'];
        }else{
            $msgResponsavel = '<div class="invalido">Coloque um responsável</div>';
        }

        //Verifica campo estado:
        if(isset($_POST['estadoIE']) && strlen($_POST['estadoIE']) == 2){
            $estadoIEString = strval($_POST['estadoIE']);
            $estadoIEUpper = strtoupper($estadoIEString);
            $estadoIE = $estadoIEUpper;
        }else{
            $msgEstadoIE = '<div class="invalido">Estado inválido!</div>';  
        }

        //Verifica e-mail:
        if(isset($_POST['emailIE']) && strlen($_POST['emailIE']) >= 5 && strlen($_POST['emailIE']) <= 100){
            // Remove os caracteres ilegais, caso tenha
            $emailIE = filter_var($_POST['emailIE'], FILTER_SANITIZE_EMAIL);
            // Valida o e-mail
            if (filter_var($emailIE, FILTER_VALIDATE_EMAIL)) {
                $emailIE = $_POST['emailIE'];
            }else {
                $msgEmailIE = '<div class="invalido">E-mail inválido!</div>';
            }
        }else{
            $msgEmailIE = '<div class="invalido">Preencha o campo e-mail</div>';
        }

        //Verifica senha:
        if(isset($_POST['passwordIE']) && strlen($_POST['passwordIE']) >= 5 && strlen($_POST['passwordIE']) <= 30){
            $passwordIE = $_POST['passwordIE'];
            //$passwordIE = password_hash($_POST['passwordIE'], PASSWORD_DEFAULT);
        }else{
            $msgSenhaIE = '<div class="invalido">Insira uma senha</div>'; 
        }
    
    if(!$msgNomeEmpresa && !$msgResponsavel && !$msgEmailIE && !$msgSenhaIE && !$msgEstadoIE){
        $result = mysqli_query($conn, "INSERT INTO usuarios_ie(nome_empresa, nome_responsavel, inscricao_estadual, cidade_ie, estado_ie, celular, telefone, senha, email) 
        VALUES ('$nomeEmpresa', '$responsavel', '$inscricao', '$cidadeIE', '$estadoIE', '$celularIE', '$telefoneIE', '$passwordIE', '$emailIE')");
        echo '<div class="cadastrado" id="btnCadastrado"><i class="far fa-check-circle"></i> Cadastrado</div>';
    }else{
        echo '<div class="invalido-central" id="invalido">Campos inválidos!</div>';
    }
}
?>

<div class="breadcrumb">
    <a href="index.php">
        Home
    </a>
    <i class="fas fa-angle-double-right"></i>
    <a href="corretor.php">
        Seja um corretor
    </a><!--login-php-->
</div><!--breadcrumb-->



<section class="cadastro">
    <div class="container">
        <div class="login-text">
            <h3 class="title text-center mt-3 mb-3">Faça seu cadastro no Corretores de Gado para pontuar no ranking de corretores nacionais e receber notícias do agronegócio</h3>
        </div><!--login-text-->
        <div class="escolha-form mt-4">
            <span>Escolha o tipo de cadastro:</span>
            <br>
            <input type="radio" name="mudaform" id="mudaCpf" onchange="mudaCPF()">
            <label for="" class="muda-campo me-4">CPF </label>
            <input type="radio" name="mudaform" id="mudaIE" onchange="mudaIE()">
            <label for="" class="muda-campo">Inscrição Estadual</label>
            <hr>
        </div><!--escolha-form-->
        
        <form action="corretor.php" class="form-cpf" id="mudac" method="post">
            <div class="row">
                <div class="col mb-3">
                    <label for="nomeCPF" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" name="nome" id="nomeCPF" maxlength="50" aria-describedby="nomeHelp" required>
                    <div id="nomeHelp" class="form-text">Insira seu nome completo</div>
                    <?php if(isset($msgNome)) echo $msgNome ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="emailCPF" class="form-label">E-mail</label>
                    <input type="text" class="form-control" name="email" id="emailCPF" maxlength="50" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Digite seu e-mail</div>
                    <?php if(isset($msgEmail)) echo $msgEmail ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                        <label for="senhaCPF" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" id="senhaCPF" maxlength="30" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Insira uma senha</div>
                        <?php if(isset($msgSenha)) echo $msgSenha ?>
                    </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" aria-describedby="cpfHelp" required>
                    <div id="cpfHelp" class="form-text">Insira seu CPF</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="enderecoCPF" class="form-label">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="enderecoCPF" maxlength="50" aria-describedby="enderecoHelp" required>
                    <div id="enderecoHelp" class="form-text">Digite seu endereço</div>
                    <?php if(isset($msgEndereco)) echo $msgEndereco ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cidadeCPF" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidadeCPF" id="cidadeCPF" maxlength="50" aria-describedby="cidadeCPFHelp" required>
                    <div id="cidadeCPFHelp" class="form-text">Nome de sua cidade</div>
                    <?php if(isset($msgCidade)) echo $msgCidade ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="estadoCPF" class="form-label">Estado</label>
                    <input type="text" size="2" maxlength="2" class="form-control" name="estadoCPF" id="estadoCPF" aria-describedby="estadoCPFHelp" required>
                    <div id="estadoCPFHelp" class="form-text">Seu estado. Ex.: SP, RJ, TO</div>
                    <?php if(isset($msgEstado)) echo $msgEstado ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="celularCPF" class="form-label">Celular</label>
                    <input type="text" name="celular" class="form-control" id="celularCPF" aria-describedby="celularHelp" required>
                    <div id="celularHelp" class="form-text">Insira um contato</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="telefoneCPF" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefoneCPF" aria-describedby="telefoneHelp">
                    <div id="telefoneHelp" class="form-text">Telefone residencial (facultativo)</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col text-center mt-4">
                    <input type="submit" value="Cadastrar" class="btn input-logar" name="cadastrar">
                </div><!--col-->
            </div><!--row-->
        </form><!--form-cpf-->

        <form action="corretor.php" class="form-ie" id="mudacp" method="post">
            <div class="row">
                <div class="col mb-3">
                    <label for="nomeIE" class="form-label">Nome da Empresa</label>
                    <input type="text" class="form-control" name="nomeEmpresa" id="nomeIE" maxlength="50" aria-describedby="nomeHelp" required>
                    <div id="nomeHelp" class="form-text">Insira o nome de sua empresa</div>
                    <?php if(isset($msgNomeEmpresa)) echo $msgNomeEmpresa ?>
                </div><!--campo-->
            </div><!--row-->
        
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="responsavelIE" class="form-label">Nome do Responsável</label>
                    <input type="text" class="form-control" name="responsavel" id="responsavelIE" maxlength="50" aria-describedby="responsavelHelp" required>
                    <div id="responsavelHelp" class="form-text">Digite o nome do responsável pela empresa</div>
                    <?php if(isset($msgResponsavel)) echo $msgResponsavel ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="inscricaoIE" class="form-label">N° de inscrição estadual</label>
                    <input type="text" class="form-control" name="inscricao" id="inscricaoIE" aria-describedby="inscricaoHelp" required>
                    <div id="inscricaoHelp" class="form-text">Insira o número da inscrição estadual da respectiva empresa</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="emailIE" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="emailIE" maxlength="50" id="emailIE" aria-describedby="emailieHelp" required>
                    <div id="emailieHelp" class="form-text">Digite seu e-mail</div>
                    <?php if(isset($msgEmailIE)) echo $msgEmailIE ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="senhaIE" class="form-label">Senha</label>
                    <input type="password" name="passwordIE" class="form-control" id="senhaIE" maxlength="50" aria-describedby="senhaIEHelp" required>
                    <div id="senhaIEHelp" class="form-text">Insira uma senha</div>
                    <?php if(isset($msgSenhaIE)) echo $msgSenhaIE ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cidadeIE" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidadeIE" id="cidadeIE" maxlength="50" aria-describedby="cidadeIEHelp" required>
                    <div id="cidadeIEHelp" class="form-text">Nome de sua cidade</div>
                    <?php if(isset($msgCidadeIE)) echo $msgCidadeIE ?>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="estadoIE" class="form-label">Estado</label>
                    <input type="text" size="2" maxlength="2" class="form-control" name="estadoIE" id="estadoIE" aria-describedby="estadoIEHelp" required>
                    <div id="estadoIEHelp" class="form-text">Seu estado</div>
                    <?php if(isset($msgEstadoIE)) echo $msgEstadoIE ?>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="celularIE" class="form-label">Celular</label>
                    <input type="text" name="celularIE" class="form-control" id="celularIE" aria-describedby="celularIEHelp" required>
                    <div id="celularIEHelp" class="form-text">Insira um contato</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="telefoneIE" class="form-label">Telefone</label>
                    <input type="text" name="telefoneIE" class="form-control" id="telefoneIE" aria-describedby="telefoneIEHelp">
                    <div id="telefoneIEHelp" class="form-text">Telefone residencial (facultativo)</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col text-center mt-4">
                    <input type="submit" value="Cadastrar" class="btn input-logar" name="cadastrarIE">
                </div><!--col-->
            </div><!--row-->
        </form><!--form-cnpj-->
    </div><!--container-->
</section><!--login-->
<?php include ('footer.php') ?>
<script src="assets/js/inputmask.js"></script>
<script src="assets/js/jquery.inputmask.js"></script>
<script src="assets/js/cadastra.js"></script>