<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];

if(!isset($codigo))
{
    header("Location: ./index.php?erro=1");
}
$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/header.css",
    3 => "assets/css/pageStyles/architect.css",
    4 => "assets/css/pageStyles/globalPages.css"
);
require_once '../includes/conexao.php';
require_once '../includes/head.php';
include_once 'includes/header.php'; 
require_once '../includes/functions.php';
$sql = "SELECT * FROM arquitetos  ORDER BY arquiteto;";
$seleciona = mysqli_query($mysqli,$sql); //executa a sql com base na conexão criada
?>
    <main>
        <section class='banner'>
            <div class='overlay'></div>
            <div class='limiter'>
                <h1 class='h1'>Consultar Arquiteto</h1>
            </div>
        </section>
        <?php include_once './includes/popUps.php';?>
        <section class='contentSection'>
            <div class='limiter'>
                <div class='row content'>
                    <div class='col c75'>
                        <table> 
                            <thead>
                                <tr class='thead'>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th class='date-th'>Data de cadastro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--Lista dos arquitetos-->
                                <?php
                                    while ($exibe = mysqli_fetch_array($seleciona, MYSQLI_ASSOC)){  
                                ?>
                                <tr class="tcontent"> 
                                    <td><?php echo $exibe['arquiteto'] ?></td>
                                    <td><?php echo $exibe['email'] ?></td>
                                    <td><?php echo formatTime("d/m/Y", $exibe['dataCadastro']);?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class='col c25 fastMenu'>
                        <h3>Link rápido</h3>
                        <ul>
                            <?php include_once './includes/addBtns.php';?>
                        </ul>
                    </div>
                </div>
            </div>
            </section>
<?php
    require_once '../includes/footer.php';
?>