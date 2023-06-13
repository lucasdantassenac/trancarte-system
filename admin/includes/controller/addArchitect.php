<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/'."novosistemaarquitetos/";
$pathUrl = "/var/www/vhosts/".$_SERVER['SERVER_NAME'] . '/httpdocs/novosistemaarquitetos/';

ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];
if(!isset($codigo)){
    header($url."?error=not-logged-in");
}
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //verifica se o arquivo de imagem foi enviado sem erros
   
    if (isset($_FILES['photo'])) {
        $err = "";
        $_FILES['photo']['name'] = $codigo. "-" . $_FILES['photo']['name'];

        $target_dir = $pathUrl."files/architect-images/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);

        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
            $err .= "tmp_name_null_";
        }

        // Check file size
        if ($_FILES["photo"]["size"] > 1000000) {
            $uploadOk = 0;
            $err .= "size_high_";

        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            $uploadOk = 0;
            $err .= "incorrectly_filetype_";

        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $err .= "upload_is_not_ok_";
            
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                $fotoUrl = $url . 'files/downloads/' . $_FILES['file']['name'];
            } else {
                $err .= "err_on_image_";
                $fotoUrl = $url."logo.png";
            }
        }   
    } else{
        $fotoUrl = $url."logo.png";
    }
    // Dados do formulário
    $arquiteto = $_POST['name'];
    $email = $_POST['email'];
    $senha = md5($_POST['password']);
    $dataCadastro = date('Y-m-d H:m:s'); 
    #$fotoUrl = isset($_FILES['file']['name'])? $url = $url . 'files/downloads/' . $_FILES['file']['name'] : $url."logo.png";
    $cpfCnpj = $_POST['cpf'];
    $rg = $_POST['rg'];
    $pis = $_POST['pis'];
    $nascimento = date('Y-m-d', strtotime($_POST['birthday'])); 
    $filiacao = $_POST['filiation'];
    $telefone = $_POST['phone'];
    $emailPremium = $_POST['email-premium'];
    $endereco = $_POST['address'];
    $dadosBancarios = $_POST['bank'];
   
    require "../../../includes/conexao.php";
 
    // Verifica se ocorreu um erro na conexão
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    // Prepara a consulta SQL

    try {
        $stmt = $mysqli->prepare("SELECT * FROM arquitetos WHERE email = ? AND status = 'a'");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
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
            $stmt->store_result();

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