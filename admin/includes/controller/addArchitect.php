<?php
$url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/'."novosistemaarquitetos/";
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];
if(!isset($codigo)){
    header($url."?error=not-logged-in");
}
echo strval($codigo);
print_r($_FILES);
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //verifica se o arquivo de imagem foi enviado sem erros
    if (isset($_FILES['photo'])) {
        
        // Diretório onde as imagens serão armazenadas
        $target_dir = $url."files/architect-images/";
        $target_file = $target_dir . strval($codigo) . "_" . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["photo"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }   
    }
    
    // Dados do formulário
    $arquiteto = $_POST['name'];
    $email = $_POST['email'];
    $senha = md5($_POST['password']);
    $dataCadastro = date('Y-m-d H:m:s'); 
    $fotoUrl = isset($target_file) ? $target_dir . $target_file : $target_dir.'logo.png';
    $cpfCnpj = $_POST['cpf'];
    $rg = $_POST['rg'];
    $pis = $_POST['pis'];
    $nascimento = date('Y-m-d', strtotime($_POST['birthday'])); 
    $filiacao = $_POST['filiation'];
    $telefone = $_POST['phone'];
    $emailPremium = $_POST['email-premium'];
    $endereco = $_POST['adress'];
    $dadosBancarios = $_POST['bank'];
    echo $fotoUrl;

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