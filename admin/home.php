<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];
if(!isset($codigo) || $_SESSION['userType'] != "admin")
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
               <div class="flexBetween addBtnSection">
                    <?php require_once './includes/popUpAddBtns.php';?>
                </div>
            </div>
        </section>
        <section class='last-requests contentSection '>
            <div class='limiter'>
                <h2 class='h4'>Últimos pedidos</h2>
                <div class='tableDiv'>
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
                </div>
                <a href='./consultarArquiteto.php' class='btn seeMore'>Ver todos</a>
            </div>
        </section>
        <section class='flexCenter pv otherEntitySection'>
            <div class='limiter'>
                <div class='row anotherEntityRow'>
                    <div class='col c50'>
                        <h3>Últimos arquitetos adicionados</h3>
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
                        <h3>Últimos vendedores adicionados</h3>
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