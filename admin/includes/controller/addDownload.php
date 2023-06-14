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
        $fileName = $_FILES['file']['name'];
        echo $fileName;
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
                $name = $_POST['fileName'];
                $registerDate = date('Y-m-d H:m:s'); 
                $url = $url. 'files/downloads/' . $_FILES['file']['name'];

                require "../../../includes/conexao.php";
            
                // Verifica se ocorreu um erro na conexão
                if ($mysqli->connect_error) {
                    die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
                }

                // Prepara a consulta SQL

                try {
                    $stmt = $mysqli->prepare("SELECT * FROM downloads WHERE url = ? AND stauts = 'a'");
                    $stmt->bind_param('s', $url);
                    $stmt->execute();
                    $stmt->store_result();
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
                
                if($stmt->num_rows > 0){
                    $stmt = $mysqli->prepare('UPDATE  downloads SET nome = ?,  url = ?, dataCadastro = ?, nomeDoArquivo = ?  WHERE url = ? AND status = "a" ');
                    $stmt->bind_param('sssss', $name, $url, $registerDate, $fileName, $url);
                    if($stmt->execute()){
                        header("location: ../../home.php?sucess=user_file_updated");
                    } else{
                        header("location: ../../home.php?error=error_on_file_exists");
                    }
                }
                else{
                    $stmt = $mysqli->prepare('INSERT INTO downloads (nome, url, dataCadastro, nomeDoArquivo) VALUES (?, ?, ?, ?)');
                    $stmt->bind_param('ssss', $name, $url, $registerDate, $fileName );
                
                    // Executa a consulta
                    if ($stmt->execute()) {
                        $stmt->store_result();
                        echo 'Arquiteto adicionado com sucesso!';
                        header("location: ../../home.php?architect=sucess");
                    } else {
                        echo "erro db";
                        header("location: ../../home.php?architect=error");
                    }
                }
                
                // Fecha a conexão
                $stmt->close();
                $mysqli->close();
            } else {
                $err .= "err_on_file_";
                echo $err;
            }
        }   
    }

}

?>