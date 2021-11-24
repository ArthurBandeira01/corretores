<?php include('header.php'); 
include_once('config.php');

$sqlPonto = "SELECT * FROM ranking ORDER BY pontuacao DESC limit 50";
$result = $conn->query($sqlPonto);
?>
<main class="principal mt-4">
    <div class="container">
        <h2 class="title text-center">
            <i class="far fa-hand-point-right"></i> Aqui se encontram os melhores e mais conceituados corretores de gado do Brasil
        </h2><!--title-->

        <div class="ranking">

            <table class="table style-table mb-4">
                <thead>
                    <tr class="linha-rank">
                        <th scope="col"><i class="fas fa-hat-cowboy"></i> Posição</th>
                        <th scope="col"><i class="far fa-user"></i> Nome Corretor</th>
                        <th scope="col"><i class="far fa-envelope"></i> E-mail</th>
                        <th scope="col"><i class="fas fa-map-marker-alt"></i> Estado</th>
                        <th scope="col"><i class="fas fa-medal"></i> Pontuação</th>
                    </tr>
                </thead>
            <tbody>
                    <?php 
                        while($user_ranking = mysqli_fetch_assoc($result)){
                            echo '<tr class="linha-rank">';
                            echo '<th scope="row" class="posicao">'.$user_ranking['id'].'°</th>';
                            echo '<td class="campo">'.$user_ranking['corretor'].'</td>';
                            echo '<td class="campo">'.$user_ranking['email'].'</td>';
                            echo '<td class="campo">'.$user_ranking['estado'].'</td>';
                            echo '<td class="campo">'.$user_ranking['pontuacao'].' pts</td>';
                            echo '</tr>';
                        }
                    ?>
            </tbody>
            </table>

            <div class="solicita-ponto text-center mt-4">
                <a href="solicita.php" class="btn btn-secondary link-solicita">
                <i class="fas fa-angle-right"></i> Solicitar negociação para pontuar</a>
            </div><!--solicita-ponto-->
        </div><!--ranking-->
    </div><!--container-->
</main><!--principal-->
<?php include ('footer.php') ?>