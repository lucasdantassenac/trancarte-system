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
include_once '../includes/functions.php';


$sql = "SELECT * FROM pedidos  ORDER BY dataCadastro DESC;";
$seleciona = mysqli_query($mysqli,$sql); //executa a sql com base na conexão criada
?>
    <main>
        <?php include_once './includes/popUps.php';  ?>
        <section class='banner'>
            <div class='overlay'></div>
            <div class='limiter'>
                <h1 class='h1'>Consultar Pedido</h1>
            </div>
        </section>
        <section class='flexCenter'>
            <div class="limiter">
               <div class="flexBetween addBtnSection">
                    <?php include_once './includes/popUpAddBtns.php';?>
                </div>
            </div>
        </section>
        <section class='contentSection'>
            <div class='limiter'>
                <table> 
                    <thead>
                        <tr class='thead'>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Pontos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($exibe = mysqli_fetch_array($seleciona, MYSQLI_ASSOC)){  ?>
                            <tr class='tcontent'>
                                <td><?php echo $exibe['pedido'] ?></td>
                                <td><?php custom_echo($exibe['cliente'], 25); ?></td>
                                <td><?php echo formatTime("d/m/Y", $exibe['data']); ?></td> 
                                <td><?php echo $exibe['valor'] ?></td> 
                                <td><?php echo $exibe['pontos'] ?></td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
<?php
    require_once '../includes/footer.php';
?>