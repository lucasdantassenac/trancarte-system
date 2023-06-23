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
$nome;
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
            $query = ("SELECT * FROM $tableName WHERE arquitetos = $id");
            $nome = "arquiteto";
            break;

        case 'pedidos':
            $query = ("SELECT  $tableName.*, arquitetos.arquiteto, vendedores.vendedor WHERE idPedido = $id INNER JOIN arquitetos ON pedidos.idArquiteto = ");
            $nome = "pedido";
        break;

        case 'vendedores':
            $query = ("SELECT * FROM $tableName WHERE idVendedor = $id");
            $nome = "vendedor";
        break;

        case 'downloads':
            $query = ("SELECT * FROM $tableName WHERE id = $id");
            $nome = "nome";
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

$selectEntity = mysqli_query($mysqli, $query); //executa a sql com base na conexão criada
$returnedEntity = mysqli_fetch_array($selectEntity, MYSQLI_ASSOC);
if(empty($returnedEntity['fotoUrl'])){
    $returnedEntity['fotoUrl'] = "logo.png";
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
                        <p class='h5 w z1'>:</p>
                        <h1 class='h1'><?php echo $returnedEntity[$nome]; ?></h1>
                    </div>
                    <div class='col colRight c40'>
                        <?php if ($tableName === 'arquitetos'){?>
                        <div class='pointsDiv tc'>
                            <h2 class='h5'>Pontuação:</h2>
                            <p class='pointsText b h3'><?php echo $returnedEntity['pontuacao'];?></p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class='contentSection '>
            <div class='limiter'>
                <div class='row'>
                    <div class='col c60'>
                        <img src='<?php echo $url. "files/architect-images/". $returnedEntity['fotoUrl'] ;?>' class="profilePhoto">
                    </div>
                    <div class='col colRight c40'>
                        <div class='dataDiv w'>
                            <h2 class='h2'>Dados</h2>
                            <form action='./controller/update.php' method='post' enctype="multipart/form-data">
                                <?php
                                if($tableName === "arquitetos"){
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "email", "E-mail", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "cpfCnpj", "CPF/CNPJ", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "rg", "RG", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "pis", "PIS", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "nascimento", "Data de Nascimento", $readonly, 'date');
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "filiacao", "Filiação", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "telefone", "Telefone", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "emailPremium", "E-mail premium", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "endereco", "Endereço", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dadosBancarios", "Dados bancários", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dataCadastro", "Data de Cadastro", $readonly, 'datetime');
                                
                                    if($_GET['edit'] == 'true'){
                            ?>  
                                    <input type='hidden' name='table' value='<?php echo $tableName ;?>'>
                                    <input type='submit' class='btn btnUpdate mt2' value='Atualizar'>
                                <?php
                                    }
                                }
                                if($tableName === "vendedores"){
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "usuario", "Usuário", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "cpf", "CPF", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "rg", "RG", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "email", "E-mail", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dataCadastro", "Data de Cadastro", $readonly, 'datetime');
                                
                                    if($_GET['edit'] == 'true'){
                                ?>  
                                    <input type='hidden' name='table' value='<?php echo $tableName ;?>'>
                                    <input type='submit' class='btn btnUpdate mt2' value='Atualizar'>
                                <?php
                                    }
                                }
                                if($tableName === "pedidos"){
                                    if($_GET['edit'] == 'true'){
                                        echoIfIssetAdmin($_GET['edit'], $returnedEntity, "pontos", "Pontuação", $readonly);
                                    }
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "email", "E-mail", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "cpfCnpj", "CPF/CNPJ", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "rg", "RG", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "pis", "PIS", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "nascimento", "Data de Nascimento", $readonly, 'date');
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "filiacao", "Filiação", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "telefone", "Telefone", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "emailPremium", "E-mail premium", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "endereco", "Endereço", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dadosBancarios", "Dados bancários", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dataCadastro", "Data de Cadastro", $readonly, 'datetime');
                                
                                    if($_GET['edit'] == 'true'){
                                ?>  
                                    <input type='hidden' name='table' value='<?php echo $tableName ;?>'>
                                    <input type='submit' class='btn btnUpdate mt2' value='Atualizar'>
                                <?php
                                    }
                                }
                                if($tableName === "downloads"){
                                    if($_GET['edit'] == 'true'){
                                        echoIfIssetAdmin($_GET['edit'], $returnedEntity, "pontuacao", "Pontuação", $readonly);
                                    }
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "email", "E-mail", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "cpfCnpj", "CPF/CNPJ", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "rg", "RG", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "pis", "PIS", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "nascimento", "Data de Nascimento", $readonly, 'date');
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "filiacao", "Filiação", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "telefone", "Telefone", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "emailPremium", "E-mail premium", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "endereco", "Endereço", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dadosBancarios", "Dados bancários", $readonly);
                                    echoIfIssetAdmin($_GET['edit'], $returnedEntity, "dataCadastro", "Data de Cadastro", $readonly, 'datetime');
                                
                                    if($_GET['edit'] == 'true'){
                                ?>  
                                    <input type='hidden' name='table' value='<?php echo $tableName ;?>'>
                                    <input type='submit' class='btn btnUpdate mt2' value='Atualizar'>
                                <?php
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    require_once '../../includes/footer.php';
?>