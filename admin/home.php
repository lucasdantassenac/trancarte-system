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
    3 => "assets/css/pageStyles/globalPages.css",
    4 => "assets/css/pageStyles/home.css"
);
require_once '../includes/conexao.php';
require_once '../includes/head.php';
include_once 'includes/header.php'; 
include_once '../includes/functions.php';




?>
    <main>
        <?php include_once './includes/popUps.php';  ?>
        <section class='banner'>
            <div class='overlay'></div>
            <div class='limiter'>
                <h1 class='h1'>Seja bem vindo(a)!</h1>
            </div>
        </section>

        <section class='controllerBtnSection flexCenter'>
            <div class="limiter">
               <div class="flexBetween">
                    <?php require_once './includes/popUpAddBtns.php';?>
                    <!--
                    <a href='#' class='btn seeMore addBtn' id='addArchitectBtn'>+ Arquitetos</a>
                    <a href='#' class='btn seeMore addBtn' id='addSellerBtn'>+ Vendedor</a>
                    <a href='#' class='btn seeMore addBtn' id='addTaskBtn'>+ Pedido</a>
                    <a href='#' class='btn seeMore addBtn' id='addDownloadBtn'>+ Download</a>
                -->
                </div>
            </div>
        </section>
        <section class='last-requests contentSection '>
            <div class='limiter'>
                <h2 class='h4'>Ultimos pedidos</h2>
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
                        <?php while ($exibe = mysqli_fetch_array($selecionaPedido, MYSQLI_ASSOC)){  ?>
                            <tr class='tcontent'>
                                <td><?php echo $exibe['pedido']; ?></td>
                                <td><?php custom_echo($exibe['cliente'], 25); ?></td>
                                <td><?php echo formatTime("d/m/Y", $exibe['data']); ?></td> 
                                <td><?php echo $exibe['valor']; ?></td> 
                                <td><?php echo $exibe['pontos']; ?></td> 
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href='./consultarArquiteto.php' class='btn seeMore'>Ver todos</a>
            </div>
        </section>
        <section class='flexCenter pv'>
            <div class='limiter'>
                <div class='row'>
                    <div class='col c50'>
                        <h3>Ultimos arquitetos adicionados</h3>
                        <table> 
                            <tbody>
                                <?php while ($exibe = mysqli_fetch_array($selecionaArquiteto, MYSQLI_ASSOC)){  ?>
                                    <tr class='tcontent'>
                                        <td><?php custom_echo($exibe['arquiteto'], 25); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href='./consultarArquiteto.php' class='btn seeMore'>Ver todos</a>
                    </div>
                    <div class='col c50'>
                        <h3>Ultimos vendedores adicionados</h3>
                        <table> 
                            <tbody>
                                <?php foreach ($selecionaVendedor as $index => $vendedor) {?>
                                    <tr class='tcontent'>
                                        <td><?php custom_echo($vendedor['vendedor'], 25); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href='./consultarVendedor.php' class='btn seeMore'>Ver todos</a>
                    </div>
                </div>
            </div>
        </section>
<?php
    require_once '../includes/footer.php';
?>