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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_FILES['file'])) {
        $err = "";
        $_FILES['file']['name'] = $codigo. "-" . $_FILES['file']['name'];
        $target_dir = $pathUrl."files/downloads/";
        $target_file = $target_dir.basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check file size
        if ($_FILES["file"]["size"] > 10000000) {
            $uploadOk = 0;
            $err .= "max_file_size_transpassed_";
        }
        if($fileType != "pdf" && $fileType != "docx" && $fileType != "doc" ) {
            $uploadOk = 0;
            $err .= "not_correctly_file_type_";
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
           echo $err; 
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
            } else {
                $err .= "err_on_image_";
                echo $err;
            }
        }   
    }
    // Dados do formulário
    $name = $_POST['fileName'];
   
    require "../../../includes/conexao.php";
 
    // Verifica se ocorreu um erro na conexão
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    // Prepara a consulta SQL
/*
    try {
        $stmt = $mysqli->prepare("SELECT * FROM downloads WHERE url = ?");
        $stmt->bind_param('s', $target_file);
        $stmt->execute();
        $stmt->store_result();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    if($stmt->num_rows > 0){
        #header("location: ../../home.php?error=user_data_exists");
    }

    else{
        $stmt = $mysqli->prepare('INSERT INTO downloads (nome, url) VALUES (?, ?)');
        $stmt->bind_param('ss', $name, $target_file);
    
        // Executa a consulta
        if ($stmt->execute()) {
            echo 'Arquiteto adicionado com sucesso!';
            header("location: ../../home.php?architect=sucess");
        } else {
            #header("location: ../../home.php?architect=error");
        }
    }
    
    // Fecha a conexão
    $stmt->close();
    $mysqli->close();*/
}
?>