<?php include('header.php') ?>
<div class="breadcrumb">
    <a href="index.php">
        Home
    </a>
    <i class="fas fa-angle-double-right"></i>
    <a href="contato.php">
        Contato
    </a><!--login-php-->
</div><!--breadcrumb-->
<section class="contato container mt-5">
            <h2 class="title text-center">
                <i class="far fa-envelope"></i>  Entre em contato conosco:
            </h2>
            <div class="row contato-duo mt-4">
                <div class="col-md-8">
                    <form action="validaForm.php" class="contato-form" method="post">
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label label-contato">Nome:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control input-contato" name="nome" placeholder="Seu nome..." required>
                                <?php if(isset($msgNome)) echo $msgNome; ?>
                            </div><!--col-->
                        </div><!--row-->
                        <div class="mb-3 row">
                            <label class="col-md-2 col-form-label label-contato">E-mail:</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control input-contato" name="email" placeholder="email@gmail.com" required>
                                <?php if(isset($msgEmail)) echo $msgEmail; ?>
                            </div><!--col-->
                        </div><!--row-->
                        <div class="text-contato">
                            <textarea class="form-control" name="mensagem" placeholder="Mande sua mensagem por aqui..." style="height: 70px" required></textarea>
                            <?php if(isset($msgMensagem)) echo $msgMensagem; ?>
                        </div>
                        <div class="row contato-enviar mt-3">
                            <div class="col-12 text-center">
                            <button class="btn contato-button" type="submit" name="enviaContato"><i class="fas fa-paper-plane"></i> Enviar</button>
                            </div><!--col-->
                        </div><!--row-->
                    </form><!--contato-form-->
                </div><!--col-->
                <div class="col-md-4 contato-text">
                    <h3 class="contato-duvidas">Possui dúvidas ou sugestão?</h3>
                    <p class="contato-p">Preencha os dados e nos envie que responderemos o mais rápido o possível.</p>
                    <span><i class="fab fa-whatsapp"></i> WhatsApp: (51) 9-9920-7592</span>
                    <br>
                    <span><i class="far fa-envelope"></i> E-mail: contato@paginacampeira.com.br</span>
                </div><!--col-md-4-->
            </div><!--row-->
        </section><!--contato-->
<?php include ('footer.php') ?>