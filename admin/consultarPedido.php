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
    3 => "assets/css/pageStyles/orders.css",
    4 => "assets/css/pageStyles/globalPages.css"
);
require_once '../includes/conexao.php';
require_once '../includes/head.php';
include_once 'includes/header.php'; 
include_once '../includes/functions.php';


$sql = "SELECT * FROM pedidos WHERE status= 'a' ORDER BY dataCadastro DESC;";
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
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisar">
                <table id='table'> 
                    <thead>
                        <tr class='thead'>
                            <th>Pedido</th>
                            <th>Cliente</th>
                            <th>Arquiteto</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Pontos</th>
                            <th>Controles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($exibe = mysqli_fetch_array($selectAllOrders, MYSQLI_ASSOC)){  ?>
                            <tr class='tcontent'>
                                <td><?php echo $exibe['pedido'] ?></td>
                                <td><?php custom_echo($exibe['cliente'], 25); ?></td>
                                <td><?php custom_echo($exibe['arquiteto'], 25); ?></td>
                                <td><?php echo formatTime("d/m/Y", $exibe['data']); ?></td> 
                                <td><?php echo $exibe['valor'] ?></td> 
                                <td><?php echo $exibe['pontos'] ?></td> 
                                <td>
                                    <a href="./includes/viewOrEdit.php?id=<?php echo $exibe['idPedido'] ?>&table=pedidos&edit=false"><span class="material-symbols-outlined">visibility</span></a>
                                    <a href="./includes/viewOrEdit.php?id=<?php echo $exibe['idPedido'] ?>&table=pedidos&edit=true"><span class="material-symbols-outlined"> edit </span></a>
                                    <a href="./includes/delete.php?id=<?php echo $exibe['idPedido']."&points=".$exibe['pontos']."&idArchitect=".$exibe['idArquiteto'];?>&table=pedidos" onclick="return confirm('Confirma a Exclusão do Pedido?')"><span class="material-symbols-outlined"> delete </span></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
<?php
    require_once '../includes/footer.php';
?>