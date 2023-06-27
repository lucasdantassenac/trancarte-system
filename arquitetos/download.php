<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];

if(!isset($codigo) || $_SESSION['userType'] == "admin")
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
include_once '../includes/header.php'; 
include_once '../includes/functions.php';


$sql = "SELECT * FROM downloads WHERE status='a' ORDER BY dataCadastro DESC;";
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
                <table> 
                    <thead>
                        <tr class='thead'>
                            <th>Nome</th>
                            <th>Arquivo</th>
                            <th>Enviado em</th>
                            <th>Controles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($exibe = mysqli_fetch_array($seleciona, MYSQLI_ASSOC)){  ?>
                            <tr class='tcontent'>
                                <td><?php echo basename($exibe['nome']); ?></td>
                                <td>
                                    <a href='<?php echo $exibe['url'] ?>' target='_blank'>
                                        <?php echo $exibe['nomeDoArquivo'] ;?>
                                    </a>
                                </td>
                                <td><?php echo formatTime('d/m/Y', $exibe['dataCadastro']); ?></td>
                                <td>
                                    <a href="<?php echo $exibe['url'] ?>" download><span class="material-symbols-outlined">download</span></a>
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