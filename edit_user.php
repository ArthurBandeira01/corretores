<?php include('header.php'); 
include('config.php');

if(!empty($_GET['id'])){
    //Variável de erro caso tenho campos inválidos no cadastro:
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM usuarios_cpf WHERE id=$id";

    $result = $conn->query($sqlSelect);
    if($result->num_rows > 0){
        while($user_data = mysqli_fetch_assoc($result)){
            $nomeCPF = $user_data['nome'];
            $emailCPF = $user_data['email'];
            $cpf = $user_data['cpf'];
            $enderecoCPF = $user_data['endereco'];
            $cidadeCPF = $user_data['cidade_cpf'];
            $estadoCPF = $user_data['estado_cpf'];
            $celularCPF = $user_data['celular'];
            $telefoneCPF = $user_data['telefone'];
            $passwordCPF = $user_data['senha'];   
        }
    }else{
        header('Location: admin/index.php');
    }
}else{
    header('Location: admin/index.php');
}
?>
<div class="breadcrumb">
    <a href="admin/index.php">
    <i class="fas fa-angle-double-right"></i> Voltar ao painel
    </a>
</div><!--breadcrumb-->
<section class="cadastro">
    <div class="container">
        <div class="login-text">
            <h3 class="title text-center mt-3 mb-3"><i class="fas fa-user-edit"></i> Editar dados do usuário</h3>
        </div><!--login-text-->
        <div class="escolha-form mt-4">
            <span>Escolha o tipo de cadastro:</span>
            <br>
            <input type="radio" name="mudaform" id="mudaCpf" onchange="mudaCPF()">
            <label for="" class="muda-campo me-4">CPF </label>
            <hr>
        </div><!--escolha-form-->
        
        <form action="admin/saveEdit.php" class="form-cpf" id="mudac" method="post">
            <div class="row">
                <div class="col mb-3">
                    <label for="nomeCPF" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" value="<?php echo $nomeCPF ?>" name="nome" id="nomeCPF" maxlength="50" aria-describedby="nomeHelp" required>
                    <div id="nomeHelp" class="form-text">Insira seu nome completo</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="emailCPF" class="form-label">E-mail</label>
                    <input type="text" class="form-control" value="<?php echo $emailCPF ?>" name="email" id="emailCPF" maxlength="50" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">Digite seu e-mail</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                        <label for="senhaCPF" class="form-label">Senha</label>
                        <input type="text" value="<?php echo $passwordCPF ?>" name="password" class="form-control" id="senhaCPF" maxlength="30" aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">Insira uma senha</div>
                    </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" value="<?php echo $cpf ?>" name="cpf" id="cpf" aria-describedby="cpfHelp" required>
                    <div id="cpfHelp" class="form-text">Insira seu CPF</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="enderecoCPF" class="form-label">Endereço</label>
                    <input type="text" class="form-control" value="<?php echo $enderecoCPF ?>" name="endereco" id="enderecoCPF" maxlength="50" aria-describedby="enderecoHelp" required>
                    <div id="enderecoHelp" class="form-text">Digite seu endereço</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cidadeCPF" class="form-label">Cidade</label>
                    <input type="text" class="form-control" value="<?php echo $cidadeCPF ?>" name="cidadeCPF" id="cidadeCPF" maxlength="50" aria-describedby="cidadeCPFHelp" required>
                    <div id="cidadeCPFHelp" class="form-text">Nome de sua cidade</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="estadoCPF" class="form-label">Estado</label>
                    <input type="text" size="2" maxlength="2" class="form-control" value="<?php echo $estadoCPF ?>" name="estadoCPF" id="estadoCPF" aria-describedby="estadoCPFHelp" required>
                    <div id="estadoCPFHelp" class="form-text">Seu estado. Ex.: SP, RJ, TO</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="celularCPF" class="form-label">Celular</label>
                    <input type="text" name="celular" class="form-control" value="<?php echo $celularCPF ?>" id="celularCPF" aria-describedby="celularHelp" required>
                    <div id="celularHelp" class="form-text">Insira um contato</div>
                </div><!--campo-->
                <div class="col-md-6 mb-3">
                    <label for="telefoneCPF" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-control" value="<?php echo $telefoneCPF ?>" id="telefoneCPF" aria-describedby="telefoneHelp">
                    <div id="telefoneHelp" class="form-text">Telefone residencial (facultativo)</div>
                </div><!--campo-->
            </div><!--row-->

            <div class="row">
                <div class="col text-center mt-4">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" value="Atualizar dados" class="btn input-logar" name="update" id="update">
                </div><!--col-->
            </div><!--row-->
        </form><!--form-cpf-->
    </div><!--container-->
</section><!--login-->
<?php include ('footer.php') ?>
<script src="assets/js/inputmask.js"></script>
<script src="assets/js/jquery.inputmask.js"></script>
<script src="assets/js/cadastra.js"></script>