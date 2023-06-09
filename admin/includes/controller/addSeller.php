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
    $sellerName = $_POST['name'];
    $user = $_POST['user'];
    $cpfCnpj = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $registerDate = date('Y-m-d H:m:s'); 
  
    echo $target_dir;
    
    require_once "../../../includes/conexao.php";
 
    // Verifica se ocorreu um erro na conexão
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    // Prepara a consulta SQL

    try {
        $stmt = $mysqli->prepare("SELECT * FROM vendedores WHERE email = ? OR user = ?");
        $stmt->bind_param('ss', $email, $user);
        $stmt->execute();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    if($stmt->num_rows > 0){
        header("location: ../../home.php?error=user_data_exists");
    }

    else{
        $stmt = $mysqli->prepare('INSERT INTO vendedores (vendedor, usuario, cpf, rg, email, senha, dataCadastro) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sssssss', $sellerName, $user, $cpfCnpj, $rg, $email, $password, $registerDate);
    
        // Executa a consulta
        if ($stmt->execute()) {
            echo 'Vendedor adicionado com sucesso!';
            header("location: ../../home.php?seller=sucess");
        } else {
            header("location: ../../home.php?seller=error");
        }
    }
    
    // Fecha a conexão
    $stmt->close();
    $mysqli->close();
}
?>