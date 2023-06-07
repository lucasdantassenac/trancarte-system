<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];

if(!isset($codigo))
{
    header("Location: ../index.php?erro=1");
}
$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/header.css",
    3 => "assets/css/pageStyles/home.css",
    4 => "assets/css/pageStyles/globalPages.css"
);
require_once '../includes/conexao.php';
require_once '../includes/head.php';
include_once '../includes/header.php'; 
include_once '../includes/functions.php';

$sqlArquiteto   = "SELECT * FROM arquitetos WHERE idArquiteto = $codigo;";
$selecionaArquiteto = mysqli_query($mysqli, $sqlArquiteto); //executa a sql com base na conexão criada
$arquiteto = mysqli_fetch_array($selecionaArquiteto, MYSQLI_ASSOC);
$sqlPedido = "SELECT pedidos.*, arquitetos.arquiteto, arquitetos.idArquiteto 
    FROM pedidos 
    INNER JOIN arquitetos 
    ON pedidos.idArquiteto = arquitetos.idArquiteto
    WHERE arquitetos.idArquiteto = $codigo
    ORDER BY dataCadastro DESC;";

$selecionaPedido = mysqli_query($mysqli,$sqlPedido); //executa a sql com base na conexão criada

function seleciona ($mysqli, $sql) {
    $queryResult = mysqli_query($mysqli, $sql);
    return $queryResult;
}
?>
    <main>
        <section class='banner'>
            <div class='overlay'></div>
            <div class='limiter'>
                <div class="row">
                    <div class='col c70'>
                        <p class='h5 w z1'>Seja bem vindo(a)!</p>
                        <h1 class='h1'><?php echo $arquiteto['arquiteto']; ?></h1>
                    </div>
                    <div class='col c30'>
                        <div class='pointsDiv'>
                            <h2 class='h5'>Sua pontuação:</h2>
                            <p class='pointsText b h3'><?php echo strval($arquiteto['pontuacao']);?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class='last-requests contentSection '>
            <div class='limiter'>
                <h2 class='h4'>Pedidos</h2>
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
        </section>
        
<?php
    require_once '../includes/footer.php';
?>