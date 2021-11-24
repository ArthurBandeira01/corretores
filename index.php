<?php include('header.php'); 
    include_once('config.php');
//Cotação:
    $sqlCotacao = "SELECT * FROM cotacao";
    $resultCot = $conn->query($sqlCotacao);
    $user_data = mysqli_fetch_assoc($resultCot);
//Termos:
    $sqlTermos = "SELECT * FROM termos";
    $resultTerm = $conn->query($sqlTermos);
    $user_termos = mysqli_fetch_assoc($resultTerm);
//Depoimentos:
    $sqlDepoimentos = "SELECT * FROM depoimentos ORDER BY id DESC limit 4";
    $resultDepoimentos = $conn->query($sqlDepoimentos);
//Banners:
    $sqlBanner = "SELECT * FROM banners ORDER BY id";
    $resultBanner = $conn->query($sqlBanner);
//Patrocinios:
    $sqlPatrocinio = "SELECT * FROM patrocinios ORDER BY id";
    $resultPatrocinio = $conn->query($sqlPatrocinio);
//Blog:
    $sqlBlog = "SELECT * FROM blog ORDER BY id DESC limit 9";
    $resultBlog = $conn->query($sqlBlog);

    $dataCot = date("d/m/Y");
?>
<main class="principal">
    <div class="container">
        <div class="row">
            <div class="col-12 cotacao mt-2">
                <?php include("cotacao.php") ?>
            </div><!--col-->
        </div><!--row-->

        <!--Carousel do Swiper-->
        <div class="swiper-container mySwiper carousel-index">
            <div class="swiper-wrapper">
            <!--Banners-->
            <?php while($user_banners = mysqli_fetch_assoc($resultBanner)){ ?>
                <div class="swiper-slide">
                    <a href="" class="link-slide">
                        <img src="admin/<?php echo $user_banners['path_banner']; ?>" alt="">
                    </a><!--link-slide-->
                </div><!--swiper-slide-->
            <?php } ?>
            </div><!--swiper-wrapper-->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div><!--swiper-->

        <section class="cotacoes-agro mt-4">
            <h2 class="title text-center">
                <i class="fas fa-hand-holding-usd"></i> Fique por dentro das cotações do agronegócio - <?php echo $dataCot; ?>
            </h2><!--title-->
            <div class="row tabelas mt-3">

                <div class="col-lg-4">
                    <div class="cot-title text-center">
                        <span>Cotação de Bovinos</span>
                    </div><!--cot-title-->
                    <table class="table table-style table-bordered mt-2">
                        <thead class="thead-border">
                            <tr>
                                <th scope="col title-cot"><i class="fas fa-sort-down"></i> Tipo</th>
                                <th scope="col title-cot"><i class="fas fa-dollar-sign"></i> Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Boi Gordo</th>
                                <td><?php echo $user_data['boi']; ?></td>
                            </tr>
                            <tr>
                                <th>Vaca de Invernar</th>
                                <td><?php echo $user_data['vaca']; ?></td>
                            </tr>
                                <th>Terneiro</th>
                                <td><?php echo $user_data['terneiro']; ?></td>
                            </tr>
                            <tr>
                                <th>Terneira</th>
                                <td><?php echo $user_data['terneira']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--col-->

                <div class="col-lg-4">
                    <div class="cot-title text-center">
                        <span>Cotação de Ovinos</span>
                    </div><!--cot-title-->
                    <table class="table table-style table-bordered mt-2">
                        <thead class="thead-border">
                            <tr>
                                <th scope="col"><i class="fas fa-sort-down"></i> Tipo</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Ovelha</th>
                                <td><?php echo $user_data['ovelha']; ?></td>
                            </tr>
                            <tr>
                                <th>Cordeiro</th>
                                <td><?php echo $user_data['cordeiro']; ?></td>
                            </tr>
                            <tr>
                                <th>Capão</th>
                                <td><?php echo $user_data['capao']; ?></td>
                            </tr>
                            <tr>
                                <th>Carneiro</th>
                                <td><?php echo $user_data['carneiro']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--col-->

                <div class="col-lg-4">
                    <div class="cot-title text-center">
                        <span>Cotação de Grãos</span>
                    </div><!--cot-title-->
                    <table class="table table-style table-bordered mt-2">
                        <thead class="thead-border">
                            <tr>
                                <th scope="col"><i class="fas fa-sort-down"></i> Tipo</th>
                                <th scope="col"><i class="fas fa-dollar-sign"></i> Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Soja</th>
                                <td><?php echo $user_data['soja']; ?></td>
                            </tr>
                            <tr>
                                <th>Arroz</th>
                                <td><?php echo $user_data['arroz']; ?></td>
                            </tr>
                            <tr>
                                <th>Milho</th>
                                <td><?php echo $user_data['milho']; ?></td>
                            </tr>
                            <tr>
                                <th>Trigo</th>
                                <td><?php echo $user_data['trigo']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--col-->

            </div><!--row-->
        </section><!--cotacoes-agro-->

        <section class="news mt-3">

            <h2 class="title text-center">
                <i class="far fa-newspaper"></i>  Notícias do Agronegócio
            </h2>

            <div class="row news-single mt-3">
                <?php while($user_blog = mysqli_fetch_assoc($resultBlog)){ ?>
                <div class="col-lg-4 single">
                    <div class="card overflow-hidden">
                        <div class="img-single card-img-top">
                            <img class="img-single-news" src="admin/<?php echo $user_blog['path_imagem']; ?>" alt="">
                        </div><!--img-single-->
                        <div class="desc-single card-body">
                            <h2 class="title-news card-title"><?php echo $user_blog['titulo']; ?></h2>
                            <span class="data mb-2"><?php echo $user_blog['data_news']; ?></span>
                            <p class="p-news card-text"><?php echo $user_blog['titulo']; ?></p>
                            <a href="blog.php" class="btn link-news">
                                <i class="far fa-eye"></i> Ver Notícia
                            </a><!--link-news-->
                        </div><!--desc-single-->
                    </div><!--card-->
                </div><!--col-->
                <?php } ?>
            </div><!--news-single-->
            <div class="ver-mais-news text-center">
                <a class="ver-mais-link btn mb-5" href="blog.php">
                    <i class="far fa-arrow-alt-circle-right"></i> LER MAIS
                </a><!--ver-mais-link-->
            </div><!--ver-mais-news-->
        </section><!--news-->
        
        <section class="ser-corretor mt-4">
            <h3 class="title">Gostaria de tornar-se um corretor de gado? Acesse o conteúdo do PDF que preparamos para você
                e entenda como funciona as diretrizes e normas:
            </h3>
            <div class="div-link">
                <a target="_blank" href="admin/<?php echo $user_termos['path_termo']; ?>" class="link-corretor text-center">
                <i class="far fa-eye"></i> Ver PDF</a>
            </div><!--link-->
        </section><!--ser-corretor-->

    <section class="beneficios mt-5">
        <h3 class="title text-center"><i class="fas fa-users"></i> Confira os benefícios de se cadastrar no corretores de gado:</h3>
        <div class="row mt-4">
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-users-cog"></i>
                <p class="mt-2">Serviços conforme suas necessidades</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-user-tie"></i>
                <p class="mt-2">Desenvolvimento profissional e capacitado</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="far fa-thumbs-up"></i>
                <p class="mt-2">Seriedade e comprometimento</p>
            </div><!--col-->
        </div><!--row-->
        <div class="row mt-4">
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-book"></i>
                <p class="mt-2">Materiais de qualidade</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="fas fa-shield-alt"></i>
                <p class="mt-2">Garantia de segurança</p>
            </div><!--col-->
            <div class="col-md-4 mt-2 beneficio d-flex flex-column align-items-center justify-content-center">
                <i class="far fa-check-circle"></i>
                <p class="mt-2">Foco no sucesso</p>
            </div><!--col-->
        </div><!--row-->
    </section><!--beneficios-->

    <!--Patrocinios-->
    <section class="patrocinios mt-3">
            <div class="line"></div>
            <h3 class="text-center mt-3 fw-lighter"><i class="far fa-handshake"></i> Patrocínios</h3>
            <div class="patrocinios-box">
                <ul class="lista-patrocinios d-flex align-items-center flex-wrap mt-4
                justify-content-md-start justify-content-center">
                <?php while($user_patrocinios = mysqli_fetch_assoc($resultPatrocinio)){ ?>
                    <li class="patrocinios-single me-2">
                        <a class="patrocinios-link" href="">
                            <span class="patrocinios-img">
                                <img src="admin/<?php echo $user_patrocinios['path_patrocinio']; ?>" alt="">
                            </span>
                        </a><!--patrocinios-link-->
                     </li><!--patrocinios-single-->    
                <?php } ?>               
                </ul>
            </div><!--patrocinios-box-->
        </section><!--patrocinios-->
    <!--fim patrocinios-->

    <!--fale com um especialista-->
    <div class="fale-conosco">
        <div class="fale">
            <span>Fale com um especialista</span>
            <img src="assets/images/icons/seta.gif" >
            <a target="_blank" href="https://api.whatsapp.com/send?phone=5551992047788&text=Ol%C3%A1!%20No%20que%20podemos%20ajudar%3F">
            <i class="fab fa-whatsapp"></i> Whatsapp
            </a>
        </div><!--fale-->
    </div><!--fale-conosco-->
    <!--fim fale com um especialista-->

    <!--depoimentos cursos-->
    <section class="depoimentos">
        <h1><i class="far fa-star"></i> Veja os depoimentos de nossos clientes satisfeitos:</h1>
        <!--Aqui puxa os depoimentos da categoria depoimentos do
        painel admin-->
        <div class="slides-depoimentos swiper-container mySwiper2">
            <div class="swiper-wrapper">
                <!--Aqui puxa o depoimento-->
                <?php while($user_depoimentos = mysqli_fetch_assoc($resultDepoimentos)){ ?>
                <div class="depoimentos-single swiper-slide">
                    <div class="box-depoimento">
                        <blockquote>"<?php echo $user_depoimentos['comentario']; ?>"</blockquote>
                        <div class="img-name">
                            <img src="admin/<?php echo $user_depoimentos['path_foto']; ?>">
                            <p><?php echo $user_depoimentos['nome']; ?></p>
                        </div><!--img-name-->
                    </div><!--box-depoimento-->  
                </div><!--depoimentos-single-->
                <?php } ?>

            </div><!--swiper-wrapper-->

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div><!--slides-depoimentos-->
    </section><!--depoimentos-->
    <!--fim depoimentos cursos-->

    <!--
        <section class="previsao mt-5">
            <h2 class="title text-center">
                <i class="fas fa-temperature-low"></i>  Fique por dentro do clima
            </h2>
            <div class="row box-previsao mt-4">
                
                <div class="previsao-search col-lg-4 mt-4">
                    <span class="busca">Buscar cidade pelo nome</span>
                    <form action="" class="field-box">
                        <input type="text" name="city" placeholder="Nome da cidade..." required>
                        <input type="text" name="state" placeholder="UF..." maxLength="2" required>
                        <i class="fas fa-chevron-right" wm-submit></i>
                    </form><!--field-box
                    <img src="assets/images/clima/clima.svg" alt="" class="clima">
                </div><!--previsao-search

                <div class="cardy-container col-lg-8 pb-3 text-center mt-4">
                    <div class="message-container">
                        <h4 class="title-clima mt-3">Aceite a permissão de localização ou pesquise por uma cidade</h4>
                    </div><!--message-container
                    <div class="overflow"></div>

                    <div class="info-main mt-4">
                        <h3 id="name-city"></h3>
                        <div class="temperature-info">
                            <h1 id="graus"></h1>
                            <span id="description"></span>
                        </div><!--temperature-info

                        <div class="climate-info">
                            <div class="minmax">
                                <span id="max-0" class="me-2"></span>
                                <span id="min-0"></span>
                            </div><!--minmax-
                            <div class="umivento">
                                <span id="humidity"></span>
                                <span id="wind"></span>
                            </div><!--umivento--
                        </div><!--climate-info--
                    </div><!--info-main--
                    <hr class="line-horizontal">

                    <div class="cards-next-days d-flex flex-column flex-md-row
                    align-items-center justify-content-between">

                        <div class="cardy card-1 mt-4">
                            <h4 id="day-1"></h4>
                            <span id="max-1"></span>
                            <span id="min-1"></span>
                        </div><!--card-1--

                        <div class="cardy card-1 mt-4">
                            <h4 id="day-2"></h4>
                            <span id="max-2"></span>
                            <span id="min-2"></span>
                        </div><!--cardy--
                        
                        <div class="cardy card-1 mt-4">
                            <h4 id="day-3"></h4>
                            <span id="max-3"></span>
                            <span id="min-3"></span>
                        </div><!--cardy--
                        <div class="cardy card-1 mt-4">
                            <h4 id="day-4"></h4>
                            <span id="max-4"></span>
                            <span id="min-4"></span>
                        </div><!--card-1--

                        <div class="cardy card-1 mt-4">
                            <h4 id="day-5"></h4>
                            <span id="max-5"></span>
                            <span id="min-5"></span>
                        </div><!--cardy--
                        
                    </div><!--next--

                </div><!--card-container--
            </div><!--box-previsao--
        </section><!--previsao-->
    <section class="prev-news row">
        <!--Previsão 2:-->
        <div class="previsao-cotacao col-md-6">
            <div id="Previsao" class="container-api-previsao"> 
                <div class="header-previsao">
                    <h2>TEMPO E TEMPERATURA</h2>
                </div><!--header-previsao-->

                <div class="body-previsao">
                    <div class="city">Rio de Janeiro, BR</div>
                    <div class="date"></div>
                    <div class="img-previsao">
                        <img src="assets/images/weather/unknown.png">
                    </div><!--img-previsao-->
                    <div class="temperatura">
                        <div>22</div>
                        <span>°C</span>
                    </div><!--temperatura-->
                    <div class="weather">Nublado</div>
                    <div class="low-high">22°c / 23°c</div>
                    <!--<p class="pressao">Pressão: </p>-->
                    <!--<p class="umidade">Umidade: </p>-->
                </div><!--body--previsao-->

                <div class="footer-previsao">
                    <input type="text" name="pesquisar" placeholder="Digite sua cidade..">
                    <button name="pesquisar" id="button" class="btn search"><i class="fas fa-search"></i></button>
                </div><!--footer-previsao-->
                <div class="previsao-mais">
                    <a class="ver-previsao" href="https://www.climatempo.com.br/" target="_blank">Próximos dias</a>
                </div><!--previsao-mais-->
            </div><!--container-api-previsão-->
        </div><!--previsao-cotacao-->
        <!--Fim previsão 2-->

        <div class="newsletter col-md-6">
            <h2 class="title"><i class="far fa-hand-point-right"></i> Insira seu e-mail e receba as novidades:</h2>
            <form method="post" class="news-field d-flex flex-column">
                <input type="email" name="email" id="emailNews" placeholder="Seu e-mail..." required>
                <button class="btn btn-success btn-news"><i class="far fa-newspaper"></i>  QUERO RECEBER AS NOVIDADES</button>
                <div class="img-n">
                    <img class="mt-3 img-letter" src="assets\images\logo\Corretores de Gado - Versão Extendida Dourado.png" alt="Corretores de Gado" title="Corretores de Gado">
                </div><!--img-n-->
            </form><!--news-field-->
        </div><!--newsletter-->
    </section><!--prev-news-->
    </div><!--container-->
</main><!--principal-->

<!--Botão de cookie-->
<div class="box-cookies hide">
   <p class="msg-cookies mt-3">Este site usa cookies para garantir que você obtenha a melhor experiência.</p>
   <button class="btn btn-cookies ms-2"><i class="far fa-thumbs-up"></i> Aceitar</button>
</div><!--box-cookies-->
<!--fim cookies-->

<?php include ('footer.php') ?>
<script src="assets/plugins/swiper/swiper.js"></script>
<script src="assets/js/index.js" defer></script>
<script src="assets/js/depoimento.js" defer></script>
<script src="assets/js/cookies.js"></script>