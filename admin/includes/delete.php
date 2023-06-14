<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $tableName = $_GET['table'];

    $query = 0;
    switch ($tableName) {
        case 'arquitetos':
            $query = ("UPDATE arquitetos SET status = 'd' WHERE idArquiteto = ? AND status = 'a' OR status = 'b'");
            break;

        case 'pedidos':
            $query = ("UPDATE pedidos SET status = 'd' WHERE idPedido = ? AND status = 'a' OR status = 'b'");

        break;

        case 'vendedores':
            $query = ("UPDATE vendedores SET status = 'd' WHERE idVendedor = ? AND status = 'a' OR status = 'b'");

        break;

        case 'downloads':
            $query = ("UPDATE downloads SET status = 'd' WHERE id = ? AND status = 'a' OR status = 'b'");
        break; 
        
        default:
            # code...
        break;
    }

    require_once '../../includes/conexao.php';

    try {
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('i',  $id);
        if($stmt->execute()){
            header("location: ../home.php?delete=$tableName-sucessfull-deleted");

        }else{
            header("location: ../home.php?delete=$tableName-error-on-delete");

        }
        $stmt->store_result();
    } catch (\Exception $th) {
        echo $th->getMessage();
    }
   
   


    
}


?>