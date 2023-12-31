<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();
$url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/' ."novosistemaarquitetos/admin/";
if(!isset($codigo) || $_SESSION['userType'] != "admin")
{
    header($url."?error=not-logged-in");
}
if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $tableName = $_GET['table'];
    $redirectTo = 'home.php';
    $points = $_GET['points'];
    $idArchitect = 0;
    $query = 0;
    switch ($tableName) {
        case 'arquitetos':
            $query = ("UPDATE arquitetos SET status = 'd' WHERE idArquiteto = ? AND status = 'a' OR status = 'b'");
            $redirectTo = 'consultarArquiteto.php';
            
            break;

        case 'pedidos':
            $query = ("UPDATE pedidos SET status = 'd' WHERE idPedido = ? AND status = 'a' OR status = 'b'");
            $points = $_GET['points'];
            $idArchitect = $_GET['idArchitect'];

            $redirectTo = 'consultarPedido.php';
            
        break;

        case 'vendedores':
            $query = ("UPDATE vendedores SET status = 'd' WHERE idVendedor = ? AND status = 'a' OR status = 'b'");
            $redirectTo = 'consultarVendedor.php';
        break;

        case 'downloads':
            $query = ("UPDATE downloads SET status = 'd' WHERE id = ? AND status = 'a' OR status = 'b'");
            $searchDownload = "SELECT * FROM downloads WHERE id = ?";
            $redirectTo = 'consultarDownload.php';
        break; 
        
        default:
            header("location:" . $_SERVER['HTTP_REFERER'] . "?delete=error_on_delete");

        break;
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
                    header("location:" . $url . "$redirectTo?delete=$tableName-sucessfull-deleted");
                }else{
                    header("location:" . $url . "$redirectTo?delete=$tableName-err_on_remove");
                }
            }
            if($tableName === 'pedidos'){
                $stmt->store_result();
                $query = "UPDATE arquitetos SET pontuacao = pontuacao - ? WHERE idArquiteto = ?";
                $stmt->prepare($query);
                $stmt->bind_param('di', $points, $id);
                $stmt->execute();
            }
            header("location:" . $url . "$redirectTo?delete=$tableName-sucessfull-deleted");

        }else{
            header("location:" . $url . "$redirectTo?delete=$tableName-error-on-delete");
        }
        $stmt->store_result();
        $stmt->close();
        $mysqli->close();
        exit;
    } catch (\Exception $th) {
        $msg = $th->getMessage();
        header("location:" . $url . "$redirectTo?delete=$tableName-error-on-delete-$msg");
        exit;
    }
   
   


    
}


?>