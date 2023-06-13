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


$sql = "SELECT * FROM downloads  ORDER BY dataCadastro DESC;";
$seleciona = mysqli_query($mysqli,$sql); //executa a sql com base na conexão criada
?>
    <main>
        <section class='banner'>
            <div class='overlay'></div>
            <div class='limiter'>
                <h1 class='h1'>Consultar Downloads</h1>
            </div>
        </section>
        <section class='contentSection'>
            <div class='limiter'>
                <div class='row content'>
                    <div class='col c75'>
                        <table> 
                            <thead>
                                <tr class='thead'>
                                    <th>Nome</th>
                                    <th>Arquivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($exibe = mysqli_fetch_array($seleciona, MYSQLI_ASSOC)){  ?>
                                    <tr class='tcontent'>
                                        <td><?php echo basename($exibe['nome']); ?></td>
                                        <td>
                                            <a href='<?php echo $exibe['url'] ?>'>
                                                <?php echo $exibe['nomeDoArquivo'] ;?>
                                            </a>
                                        </td>
                                        <td><?php echo $exibe['dataCadastro'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class='col c25 fastMenu'>
                        <h3>Link rápido</h3>
                        <ul>
                            <li><a href='#'>Adicionar <b>novo </b>arquiteto</a></li>
                            <li><a href='#'>Adicionar <b>novo </b>pedido</a></li>
                            <li><a href='#'>Adicionar <b>novo </b>vendedor</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            </section>
<?php
    require_once '../includes/footer.php';
?>