<?php
$url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/'."novosistemaarquitetos/";
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r( $_FILES);
    //verifica se o arquivo de imagem foi enviado sem erros
    if (isset($_FILES['photo'])) {
        // Diretório onde as imagens serão armazenadas
        $uploadDir = "../../../files/architect-images/";
        echo 'oi';
        // Obter informações sobre o arquivo de imagem
        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];

        // Verifica se o arquivo de imagem já existe
        if (file_exists($uploadDir . $fileName)) {
            // Gera um novo nome de arquivo com um número aleatório
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $fileName = pathinfo($fileName, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $extension;
        }

        // Move o arquivo de imagem para o diretório de upload
        move_uploaded_file($fileTmpName, $uploadDir . $fileName);
    }
    
    // Dados do formulário
    $arquiteto = $_POST['name'];
    $email = $_POST['email'];
    $senha = md5($_POST['password']);
    $dataCadastro = date('Y-m-d H:m:s'); 
    $fotoUrl = isset($fileName) ? $uploadDir . $fileName : $uploadDir.'logo.png';
    $cpfCnpj = $_POST['cpf'];
    $rg = $_POST['rg'];
    $pis = $_POST['pis'];
    $nascimento = date('Y-m-d', strtotime($_POST['birthday'])); 
    $filiacao = $_POST['filiation'];
    $telefone = $_POST['phone'];
    $emailPremium = $_POST['email-premium'];
    $endereco = $_POST['adress'];
    $dadosBancarios = $_POST['bank'];
    require "../../../includes/conexao.php";
 
    // Verifica se ocorreu um erro na conexão
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }
/*
    // Prepara a consulta SQL
    $stmt = $mysqli->prepare('INSERT INTO arquitetos (arquiteto, email, senha, dataCadastro, fotoUrl, cpfCnpj, rg, pis, nascimento,  filiacao, telefone, emailPremium, endereco, dadosBancarios) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssssssssssss', $arquiteto, $email, $senha, $dataCadastro, $fotoUrl, $cpfCnpj, $rg, $pis, $nascimento, $filiacao, $telefone, $emailPremium, $endereco, $dadosBancarios);

    // Executa a consulta
    if ($stmt->execute()) {
        echo 'Arquiteto adicionado com sucesso!';
        #header("location: ../../../home.php?architect=sucess");
    } else {
        #header("location: ../../../home.php?architect=error");

    }
    // Fecha a conexão
    $stmt->close();
    $mysqli->close();*/
}
?>