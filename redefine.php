<?php include("header.php") ?>
<section class="redefine">
    <form action="redefine-senha.php" method="post" class="redefine-form">
        <!--Aqui puxa o nome do usuário que irá redefinir a senha:-->
        <p>Olá Fulano de tal <i class="far fa-smile-beam"></i></p>
        
        <div class="redefine-form-campo">
            <label for="redefine">* Digite sua nova senha:</label>
            <input type="password" name="senha" placeholder="Nova senha.." required>
        </div><!--redefine-form-campo-->

        <div class="redefine-form-campo">
            <label for="redefine">* Confirme sua nova senha:</label>
            <input type="password" name="senha" placeholder="Confirme a senha.." required>
        </div><!--redefine-form-campo-->

        <button type="submit" name="acao" class="btn redefine-button"><i class="fas fa-check"></i> Enviar</button>
    </form>
</section><!--redefine-senha-->

<!--Scripts de funções do site-->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/navbar.js"></script>
<!--fim script-->