<?php include('header.php');
include_once('config.php');
//Blog: 
$sqlBlog = "SELECT titulo, subtitulo, conteudo, data_news FROM blog ORDER BY id DESC limit 1";
$resultBlog = $conn->query($sqlBlog);
$user_blog = mysqli_fetch_assoc($resultBlog);
?>
<div class="breadcrumb">
    <a href="blog.php">
        Blog
    </a>
    <i class="fas fa-angle-double-right"></i>
    <a href="blog-single.php">
        Notícia
    </a><!--login-php-->
</div><!--breadcrumb-->

<main class="principal">
    <div class="container">
        <h2 class="titulo"><?php echo $user_blog['titulo']; ?></h2>
        <div class="data-box">
            <span class="data-news"><i class="far fa-clock"></i> <?php echo $user_blog['data_news']; ?></span>
        </div><!--data-box-->
        <div class="breve-descricao mt-5">
            <p class="breve-desc"><?php echo $user_blog['conteudo']; ?></p><!--breve-desc-->
        </div><!--breve-descricao-->
    </div><!--container-->
</main><!--principal-->
<?php include ('footer.php') ?>