<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/'."novosistemaarquitetos/";
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];
if(!isset($codigo) || $_SESSION['userType'] != "admin"){
    header($url."?error=not-logged-in");
}
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Dados do formulário
    $orderNumber = $_POST['order'];
    $clientName = $_POST['client'];
    $orderDate = date('Y-m-d H:m', strtotime($_POST['date'])); 
    $orderValue = $_POST['value'];
    $points = $_POST['points'];
    $sellerId = $_POST['orderSeller'];
    $architectId = $_POST['orderArchitect'];
    $registerDate = date('Y-m-d H:m:s'); 
    
    echo $orderNumber."<br>";
    echo $clientName."<br>";
    echo $orderDate."<br>";
    echo $orderValue."<br>";
    echo $points."<br>";
    echo $sellerId."<br>";
    echo "arquiteto:". $architectId."<br>";
    echo $registerDate."<br>";
    require_once "../../../includes/conexao.php";
 
    if ($mysqli->connect_error) {
        die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
    }

    try {
        $stmt = $mysqli->prepare("SELECT * FROM pedidos WHERE pedido = ? AND status = 'a'");
        $stmt->bind_param('s', $orderNumber);
        $stmt->execute();
        $stmt->store_result();
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    
    if($stmt->num_rows > 0){
        header("location: ../../home.php?error=order_data_exists");
    } else{
        try {
            $stmt = $mysqli->prepare('INSERT INTO pedidos (`idArquiteto`, `pedido`, `cliente`, `idVendedor`, `data`, `valor`, `pontos`, `dataCadastro`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bind_param('iisisdds', $architectId, $orderNumber, $clientName, $sellerId, $orderDate, $orderValue, $points, $registerDate);
            $stmt->execute();
            echo $stmt->affected_rows;
            $stmt->store_result();
        }catch (\Throwable $th) {
            echo $th->getMessage();
        }
        
        if ($stmt->affected_rows > 0) {
            
            try{
                $stmt = $mysqli->prepare("UPDATE arquitetos SET pontuacao = pontuacao + ? WHERE idArquiteto = ?");
                $stmt->bind_param("di", $points, $architectId);
                $stmt->execute();
                $stmt->store_result();
                echo $stmt->affected_rows;
                print_r($stmt);
                header("location: ../../home.php?order=sucess");
            }catch(Exception $e){
                echo $e->getMessage().'<br>';
                echo $e->getCode().'<br>';
                echo $e->getLine()."<br>";
                header("location: ../../home.php?orderError=".$e->getMessage());
            }
        } else {
            header("location: ../../home.php?order=error");
        }
    }
    
    $stmt->close();
    $mysqli->close();
}
?>