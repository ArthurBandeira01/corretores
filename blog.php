<?php include('header.php'); 
include_once('config.php');
//Blog:
$sqlBlog = "SELECT * FROM blog ORDER BY id DESC limit 15";
$resultBlog = $conn->query($sqlBlog);

//Banner: 
$sqlBanner = "SELECT path_imagem, subtitulo FROM blog ORDER BY id DESC limit 1";
$resultBanner = $conn->query($sqlBanner);
$user_banner = mysqli_fetch_assoc($resultBanner);
?>
<main class="principal">
    <div class="container">
        
        <div class="noticia-banner-destaque mt-4">
            <a href="blog-single.php" class="link-noticia-destaque">
                <img src="admin/<?php echo $user_banner['path_imagem']; ?>" class="noticia-destaque-img">
                <div class="noticia-background"></div>
                <div class="noticia-banner">
                    <div class="noticia-title">
                        <h2>NOTÍCIA</h2>
                    </div><!--noticia-title-->

                    <!--Aqui pega a descrição da notícia-->
                    <div class="noticia-descricao">
                        <?php echo $user_banner['subtitulo']; ?>
                    </div><!--noticia-descricao-->
                </div><!--noticia-banner-->
            </a><!--link-noticia-destaque-->
        </div><!--noticia-banner-destaque-->
        
        <hr>
        <h3 class="title text-center">
            <i class="far fa-newspaper"></i> Confira as últimas notícias do agronegócio
        </h3>
        <div class="ultimas-noticias">
        <?php while($user_blog = mysqli_fetch_assoc($resultBlog)){ ?> 
            <div class="box-single">
                <div class="img-news-single">
                    <img src="admin/<?php echo $user_blog['path_imagem']; ?>" class="img-news" alt="">
                </div><!--col-->
                <div class="desc-news">
                    <div class="title-box">
                        <h3 class="title-box-news"><?php echo $user_blog['titulo']; ?></h3>
                    </div><!--title-box-->
                    <div class="data-box">
                        <span class="data-news"><?php echo $user_blog['data_news']; ?></span>
                    </div><!--data-box-->
                    <div class="breve-descricao">
                        <p class="breve-desc">
                        <?php echo $user_blog['conteudo']; ?>
                        </p><!--breve-desc-->
                    </div><!--breve-descricao-->
                    <div class="link-box">
                        <a href="blog-single.php" class="link-box-desc">
                            <i class="fas fa-eye"></i> LEIA MAIS
                        </a><!--link-box-desc-->
                    </div><!--link-box-->
                </div><!--col-->           
            </div><!--box-single-->
        <?php } ?>
        </div><!--ultimas-noticias-->

        <div class="ver-mais-news text-center mt-5">
            <a class="ver-mais-link btn mb-5" href="blog-mais.php">
                <i class="far fa-arrow-alt-circle-right"></i> LER MAIS
            </a><!--ver-mais-link-->
        </div><!--ver-mais-news-->

    </div><!--container-->
</main><!--principal-->
<?php include ('footer.php') ?>
<script src="assets/plugins/swiper/swiper.js"></script>
<script src="assets/js/blog.js" defer></script>