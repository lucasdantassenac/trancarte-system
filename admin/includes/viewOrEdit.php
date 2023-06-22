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
$tableName;
$query = 0;
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    if($_GET['edit'] == 'true') $readonly = "";
    
    if(!isset($_GET['table']) || empty($_GET['table'])){
        echo "sem tabela";
    }else{
        $tableName = $_GET['table'];
    }


    
    switch ($tableName) {
        case 'arquitetos':
            $query = ("SELECT * FROM $tableName WHERE idArquiteto = $id");
            break;

        case 'pedidos':
            $query = ("UPDATE pedidos SET status = 'd' WHERE idPedido = ? AND status = 'a' OR status = 'b'");

        break;

        case 'vendedores':
            $query = ("UPDATE vendedores SET status = 'd' WHERE idVendedor = ? AND status = 'a' OR status = 'b'");

        break;

        case 'downloads':
            $query = ("UPDATE downloads SET status = 'd' WHERE id = ? AND status = 'a' OR status = 'b'");
            $searchDownload = "SELECT * FROM downloads WHERE id = ?";
        break; 
        
        default:
            header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=error_on_delete");

        break;
    }

}else{
    echo "sem iD";
}

$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/header.css",
    3 => "assets/css/pageStyles/globalPages.css",
    4 => "assets/css/pageStyles/profile.css",
    5 => "assets/css/pageStyles/viewOrEdit.css"
);
require_once '../../includes/conexao.php';
require_once '../../includes/head.php';
include_once '../includes/header.php'; 
include_once '../../includes/functions.php';
include_once './adminFunctions.php';

$selecionaArquiteto = mysqli_query($mysqli, $query); //executa a sql com base na conexão criada
$arquiteto = mysqli_fetch_array($selecionaArquiteto, MYSQLI_ASSOC);
if(empty($arquiteto['fotoUrl'])){
    $arquiteto['fotoUrl'] = "logo.png";
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
                        <p class='h5 w z1'>Arquiteto(a):</p>
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
                                echoIfIssetAdmin($arquiteto, "email", "E-mail", $readonly);
                                echoIfIssetAdmin($arquiteto, "cpfCnpj", "CPF/CNPJ", $readonly);
                                echoIfIssetAdmin($arquiteto, "rg", "RG", $readonly);
                                echoIfIssetAdmin($arquiteto, "pis", "PIS", $readonly);
                                echoIfIssetAdmin($arquiteto, "nascimento", "Data de Nascimento", 'date', $readonly, 'date');
                                echoIfIssetAdmin($arquiteto, "dataCadastro", "Data de Cadastro", $readonly, 'date');
                                echoIfIssetAdmin($arquiteto, "filiacao", "Filiação", $readonly);
                                echoIfIssetAdmin($arquiteto, "telefone", "Telefone", $readonly);
                                echoIfIssetAdmin($arquiteto, "emailPremium", "E-mail premium", $readonly);
                                echoIfIssetAdmin($arquiteto, "endereco", "Endereço", $readonly);
                                echoIfIssetAdmin($arquiteto, "dadosBancarios", "Dados bancários", $readonly);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    require_once '../../includes/footer.php';
?>