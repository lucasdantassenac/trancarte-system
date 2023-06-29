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
    4 => "assets/css/pageStyles/ranking.css"
);
require_once 'includes/conexao.php';
require_once 'includes/head.php';

if($_SESSION['userType'] == 'admin')
{
    include_once 'admin/includes/header.php';
}else
{
    include_once 'includes/header.php'; 
}

include_once 'includes/functions.php';

    $sqlPedido           = "SELECT pedidos.*, arquitetos.arquiteto FROM pedidos INNER JOIN arquitetos ON pedidos.idArquiteto = arquitetos.idArquiteto WHERE pedidos.status = 'a' ORDER BY pontos DESC;";
    $sqlVendedor         = "SELECT * FROM vendedores WHERE status = 'a' ORDER BY vendedor DESC;";
    $sqlArquiteto        = "SELECT * FROM arquitetos WHERE status = 'a' ORDER BY pontuacao DESC ;";

    $selecionaPedido     = mysqli_query($mysqli, $sqlPedido); 
    $selecionaArquiteto  = mysqli_query($mysqli, $sqlArquiteto); 
    $selecionaVendedor   = mysqli_query($mysqli, $sqlVendedor);
?>
    <main>
        <?php 
            if($_SESSION['userType'] == 'admin'):
                include_once './admin/includes/popUps.php';
            endif  
        ?>
        <section class='banner'>
            <div class='overlay'></div>
            <div class='limiter'>
                <h1 class='h1'>Ranking</h1>
            </div>
        </section>
        <?php if($_SESSION['userType'] == 'admin'): ?>
            <section class='controllerBtnSection flexCenter'>
                <div class="limiter">
                <div class="flexBetween">
                        <?php require_once './admin/includes/popUpAddBtns.php';?>
                    </div>
                </div>
            </section>
        <?php endif ?>
        <section class='flexCenter pv'>
            <div class='limiter'>
                <div class='row'>
                    <div class='col c40'>
                        <h2 class='h4'>Pedidos</h2>
                        <table> 
                            <thead>
                                <tr class='thead'>
                                    <th>Pedido</th>
                                    <th>Pontos</th>
                                    <?php if($_SESSION['userType'] === 'admin'):?>
                                        <th> </th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($exibe = mysqli_fetch_array($selecionaPedido, MYSQLI_ASSOC)){  ?>
                                    <tr class='tcontent'>
                                        <td><?php echo $exibe['pedido']; ?></td>
                                        <td><?php echo $exibe['pontos']; ?></td> 
                                        <?php if($_SESSION['userType'] === 'admin'):?>
                                            <td> <a href="./admin/includes/viewOrEdit.php?id=<?php echo $exibe['idPedido'] ?>&table=pedidos&edit=false"><span class="material-symbols-outlined">visibility</span></a> </td>
                                        <?php endif ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class='col c40'>
                        <h2 class='h4'>Arquitetos</h2>
                        <table> 
                            <thead>
                                <tr class='thead'>
                                    <th>Arquiteto</th>
                                    <th>Pontos</th>
                                    <?php if($_SESSION['userType'] === 'admin'):?>
                                        <th> </th>
                                    <?php endif ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($exibe = mysqli_fetch_array($selecionaArquiteto, MYSQLI_ASSOC)){  ?>
                                    <tr class='tcontent'>
                                        <td><?php custom_echo($exibe['arquiteto'], 25); ?></td>
                                        <td><?php echo $exibe['pontuacao']; ?></td>
                                        <?php if($_SESSION['userType'] === 'admin'):?>
                                            <td> <a href="./admin/includes/viewOrEdit.php?id=<?php echo $exibe['idArquiteto'] ?>&edit=false&table=arquitetos"><span class="material-symbols-outlined">visibility</span></a> </td>
                                        <?php endif ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class='col c20'>
                        <h2 class='h4'>Vendedor</h2>
                        <table> 
                            <thead>
                                <tr class='thead'>
                                    <th>Vendedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($selecionaVendedor as $index => $vendedor) {?>
                                    <tr class='tcontent'>
                                        <td><?php custom_echo($vendedor['vendedor'], 25); ?></td>
                                        <?php if($_SESSION['userType'] === 'admin'):?>
                                            <td><a href="./admin/includes/viewOrEdit.php?id=<?php echo $vendedor['idVendedor']?>&table=vendedores&edit=false"><span class="material-symbols-outlined">visibility</span></a> </td>
                                        <?php endif ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
<?php
    require_once './includes/footer.php';
?>


