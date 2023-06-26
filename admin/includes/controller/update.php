<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();
echo "oi";

$codigo = $_SESSION['codigo'];
if(!isset($codigo) || $_SESSION['userType'] != "admin")
{
    header($url."?error=not-logged-in");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $tableName = $_POST['table'];
    $query = 0;
    $searchDownload = 0;
    require "../../../includes/conexao.php";


    if($tableName === 'arquitetos'){

        #$fotoUrl = isset($_FILES['file']['name'])? $url = $url . 'files/downloads/' . $_FILES['file']['name'] : $url."logo.png";
        $arquiteto = $_POST['arquiteto'];
        $email = $_POST['email'];
        $cpfCnpj = $_POST['cpfCnpj'];
        $rg = $_POST['rg'];
        $pis = $_POST['pis'];
        $nascimento = date('Y-m-d', strtotime($_POST['nascimento'])); 
        $filiacao = $_POST['filiacao'];
        $telefone = $_POST['telefone'];
        $emailPremium = $_POST['emailPremium'];
        $endereco = $_POST['endereco'];
        $dadosBancarios = $_POST['dadosBancarios'];
        $pontuacao = $_POST['pontuacao'];

        echo $arquiteto. "<br>";
        echo $email. "<br>";
        echo $cpfCnpj. "<br>";
        echo $rg. "<br>";
        echo $pis. "<br>";
        echo $nascimento. "<br>";
        echo $filiacao. "<br>";
        echo $telefone. "<br>";
        echo $emailPremium. "<br>";
        echo $endereco. "<br>";
        echo $dadosBancarios. "<br>";
        echo $pontuacao. "<br>";

        $stmt = $mysqli->prepare('UPDATE arquitetos SET arquiteto=?, pontuacao=?, email=?, cpfCnpj=?, rg=?, pis=?, nascimento=?, filiacao=?, telefone=?, emailPremium=?, endereco=?, dadosBancarios=? WHERE idArquiteto=?');
        $stmt->bind_param('sdssssssssssi', $arquiteto, $pontuacao, $email,  $cpfCnpj, $rg, $pis, $nascimento, $filiacao, $telefone, $emailPremium, $endereco, $dadosBancarios, $id);

        // Executa a consulta
        if ($stmt->execute()) {
            $stmt->store_result();

            header("location: ../../consultarArquiteto.php?architect=sucess");
        } else {
            header("location: ../../consultarArquiteto.php?architect=error");
        }
                // Fecha a conexão
        $stmt->close();
        $mysqli->close();
    }
    elseif($tableName === 'pedidos'){
           
            $orderNumber = $_POST['pedido'];
            $clientName = $_POST['cliente'];
            $orderDate = date('Y-m-d H:m', strtotime($_POST['data'])); 
            $orderValue = $_POST['valor'];
            $points = $_POST['pontos'];
            $architectId = $_POST['orderArchitect'];
            $sellerId = $_POST['orderSeller'];
            $orderId = $_POST['id'];
            
            $stmt = $mysqli->prepare('UPDATE pedidos SET pedido=?, cliente=?, data=?, valor=?, pontos=?, idArquiteto=?, idVendedor=? WHERE idPedido=?');
            $stmt->bind_param('issddiii', $orderNumber, $clientName, $orderDate, $orderValue, $points, $architectId, $sellerId, $orderId);
    
            // Executa a consulta
            if ($stmt->execute()) {
                $stmt->store_result();
    
                header("location: ../../consultarPedido.php?order=sucess");
            } else {
                header("location: ../../consultarPedido.php?order=error");
            }
                    // Fecha a conexão
            $stmt->close();
            $mysqli->close();
        
    }elseif($tableName === 'vendedores'){
        
        $sellerName = $_POST['vendedor'];
        $user = $_POST['usuario'];
        $cpfCnpj = $_POST['cpf'];
        $rg = $_POST['rg'];
        $email = $_POST['email'];

        try {
            $stmt = $mysqli->prepare("SELECT * FROM vendedores WHERE email = ? OR usuario = ? AND status = 'a'");
            $stmt->bind_param('ss', $email, $user);
            $stmt->execute();
            $stmt->store_result();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        
        if($stmt->num_rows > 0){
            header("location: ../../home.php?error=user_data_exists");
        }
    
        else{
            $stmt = $mysqli->prepare('UPDATE vendedores SET vendedor=?, usuario=?, cpf=?, rg=?, email=? WHERE idVendedor=?');
            $stmt->bind_param('sssssi', $sellerName, $user, $cpfCnpj, $rg, $email, $id);

            // Executa a consulta
            if ($stmt->execute()) {
                $stmt->store_result();

                header("location: ../../consultarVendedor.php?seller=sucess");
            } else {
                header("location: ../../consultarVendedor.php?seller=error");
            }
                    // Fecha a conexão
            $stmt->close();
            $mysqli->close();
        }
    }elseif($tableName === 'downloads'){
        
        $fileName = $_POST['nome'];
        try {
            $stmt = $mysqli->prepare("UPDATE downloads SET 'nomeDoArquivo' = ? WHERE id = ?");
            $stmt->bind_param('si',  $fileName, $id);

            if ($stmt->execute()) {
                $stmt->store_result();
                header("location: ../../consultarPedido.php?order=sucess");
            } else {
                $stmt->store_result();
                header("location: ../../consultarPedido.php?order=error");
            }

            // Fecha a conexão
            $stmt->close();
            $mysqli->close();
            exit;
        } catch (\Exception $th) {
            $msg = $th->getMessage();
            header("location:" . $_SERVER['HTTP_REFERER'] . "?download=$tableName-error-on-download-$msg");
            exit;
        }
    }

    
}
?>