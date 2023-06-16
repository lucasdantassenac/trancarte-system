<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];


if(!isset($codigo) || $_SESSION['userType'] != "admin")
{
    header($url."?error=not-logged-in");
}

$id = "";
$readonly = "readonly";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    if($_GET['edit'] == 'true')
    {
        $readonly = "";
    }
}else{
    echo "sem iD";
}

$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/header.css",
    3 => "assets/css/pageStyles/globalPages.css",
    4 => "assets/css/pageStyles/profile.css"
);
require_once '../../includes/conexao.php';
require_once '../../includes/head.php';
include_once '../includes/header.php'; 
include_once '../../includes/functions.php';

$sqlArquiteto   = "SELECT * FROM arquitetos WHERE idArquiteto = $id;";
$selecionaArquiteto = mysqli_query($mysqli, $sqlArquiteto); //executa a sql com base na conexão criada
$arquiteto = mysqli_fetch_array($selecionaArquiteto, MYSQLI_ASSOC);
if(!isset($arquiteto['fotoUrl'])){
    $arquiteto['fotoUrl'] = $url."logo.png";
}

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
                    <div class='col c60'>
                        <p class='h5 w z1'>Perfil</p>
                        <h1 class='h1'><?php echo $arquiteto['arquiteto']; ?></h1>
                    </div>
                    <div class='col colRight c40'>
                        <div class='pointsDiv tc'>
                            <h2 class='h5'>Pontuação:</h2>
                            <p class='pointsText b h3'><?php echo $arquiteto['pontuacao'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class='contentSection '>
            <div class='limiter'>
                <div class='row'>
                    <div class='col c60'>
                        <img src='<?php echo $url. "files/architect-images/". $arquiteto['fotoUrl'] ;?>' class="profilePhoto">
                    </div>
                    <div class='col colRight c40'>
                        <div class='dataDiv w'>
                            <h2 class='h2'>Dados</h2>
                            <?php
                                echoIfIsset($arquiteto, "email", "E-mail");
                                echoIfIsset($arquiteto, "cpfCnpj", "CPF/CNPJ");
                                echoIfIsset($arquiteto, "rg", "RG");
                                echoIfIsset($arquiteto, "pis", "PIS");
                                echoIfIsset($arquiteto, "nascimento", "Data de Nascimento");
                                echoIfIsset($arquiteto, "filiacao", "Filiação");
                                echoIfIsset($arquiteto, "telefone", "Telefone");
                                echoIfIsset($arquiteto, "emailPremium", "E-mail premium");
                                echoIfIsset($arquiteto, "endereco", "Endereço");
                                echoIfIsset($arquiteto, "dadosBancarios", "Dados bancários");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    require_once '../includes/footer.php';
?>