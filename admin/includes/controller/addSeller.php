<?php
$url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/'."novosistemaarquitetos/";
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];
if(!isset($codigo)){
    header($url."?error=not-logged-in");
}
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Dados do formulário
    $arquiteto = $_POST['name'];
    $email = $_POST['email'];
    $senha = md5($_POST['password']);
    $dataCadastro = date('Y-m-d H:m:s'); 
    $fotoUrl = isset($target_file) ? $target_file : $target_dir.'logo.png';
    $cpfCnpj = $_POST['cpf'];
    $rg = $_POST['rg'];
    $pis = $_POST['pis'];
    $nascimento = date('Y-m-d', strtotime($_POST['birthday'])); 
    $filiacao = $_POST['filiation'];
    $telefone = $_POST['phone'];
    $emailPremium = $_POST['email-premium'];
    $endereco = $_POST['address'];
    $dadosBancarios = $_POST['bank'];
    echo $target_dir;
    
    require "../../../includes/conexao.php";
 
    // Verifica se ocorreu um erro na conexão
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    // Prepara a consulta SQL

    try {
        $stmt = $mysqli->prepare("SELECT * FROM arquitetos WHERE email = ?");
        $stmt->bind_param('sss', $email);
        $stmt->execute();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    if($stmt->num_rows > 0){
        header("location: ../../home.php?error=user_data_exists");
    }

    else{
        $stmt = $mysqli->prepare('INSERT INTO arquitetos (arquiteto, email, senha, dataCadastro, fotoUrl, cpfCnpj, rg, pis, nascimento,  filiacao, telefone, emailPremium, endereco, dadosBancarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssssssssssss', $arquiteto, $email, $senha, $dataCadastro, $fotoUrl, $cpfCnpj, $rg, $pis, $nascimento, $filiacao, $telefone, $emailPremium, $endereco, $dadosBancarios);
    
        // Executa a consulta
        if ($stmt->execute()) {
            echo 'Arquiteto adicionado com sucesso!';
            header("location: ../../home.php?architect=sucess");
        } else {
            header("location: ../../home.php?architect=error");
        }
    }
    
    // Fecha a conexão
    $stmt->close();
    $mysqli->close();
}
?>