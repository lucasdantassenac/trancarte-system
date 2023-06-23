<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

if(!isset($codigo) || $_SESSION['userType'] != "admin")
{
    header($url."?error=not-logged-in");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $tableName = $_GET['table'];
        $query = 0;
        $searchDownload = 0;

        if($tableName === 'arquitetos'){

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

            $query = ("
                UPDATE arquitetos 
                SET
                WHERE idArquiteto = ? AND status = 'a' OR status = 'b'"
            );

        }elseif($tableName === 'pedidos'){
           
            $orderNumber = $_POST['order'];
            $clientName = $_POST['client'];
            $orderDate = date('Y-m-d H:m', strtotime($_POST['date'])); 
            $orderValue = $_POST['value'];
            $points = $_POST['points'];
            $sellerId = $_POST['orderSeller'];
            $architectId = $_POST['orderArchitect'];
            $registerDate = date('Y-m-d H:m:s'); 

            $query = ("UPDATE pedidos SET status = 'd' WHERE idPedido = ? AND status = 'a' OR status = 'b'");
        
        }elseif($tableName === 'vendedores'){
            
            $sellerName = $_POST['name'];
            $user = $_POST['user'];
            $cpfCnpj = $_POST['cpf'];
            $rg = $_POST['rg'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $registerDate = date('Y-m-d H:m:s'); 

            $query = ("UPDATE vendedores SET status = 'd' WHERE idVendedor = ? AND status = 'a' OR status = 'b'");

        }elseif($tableName === 'downloads'){
            
            $_FILES['file']['name'] = $codigo. "-" . $_FILES['file']['name'];
            $target_dir = $pathUrl."files/downloads/";
            $target_file = $target_dir.basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $fileName = $_FILES['file']['name'];
            $query = ("UPDATE downloads SET status = 'd' WHERE id = ? AND status = 'a' OR status = 'b'");
            $searchDownload = "SELECT * FROM downloads WHERE id = ?";
        }
        require_once '../../includes/conexao.php';

        try {
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i',  $id);
            if($stmt->execute()){
                if($tableName === "downloads"){
                    $stmt->store_result();
                    $stmt->prepare($searchDownload);
                    $stmt->bind_param('i', $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $pathUrl = "/var/www/vhosts/".$_SERVER['SERVER_NAME'] . '/httpdocs/novosistemaarquitetos/';
                    $fileName = 0;
                    $removed = 0;
                    while ($row = $result->fetch_array(MYSQLI_NUM)) {
                        $fileName = $row[6];
                        if(!$fileName || $fileName == null || !isset($fileName) || empty($fileName)){
                            echo "vazio";
                            $fileName = false;
                            header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=filename_error");
                        }elseif($fileName != false){
                            if(unlink($pathUrl."files/downloads/".$fileName)){
                                $removed = 1 ;
                            }
                                
                        }
                    }
                    if($removed === 1 ){
                        header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=$tableName-sucessfull-deleted");
                    }else{
                        header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=$tableName-err_on_remove");
                    }
                }
                header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=$tableName-sucessfull-deleted");

            }else{
                header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=$tableName-error-on-delete");
            }
            $stmt->store_result();
            $stmt->close();
            $mysqli->close();
            exit;
        } catch (\Exception $th) {
            $msg = $th->getMessage();
            header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=$tableName-error-on-delete-$msg");
            exit;
        }
    
}

?>