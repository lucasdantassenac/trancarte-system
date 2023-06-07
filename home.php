<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();
	
	$codigo=$_SESSION["codigo"];
	  if(!isset($codigo))
	  {
		  header("Location: /index.php?erro=1");
	  }
	
	include_once("includes/conexao.php");
	
	//Arquiteto
	$sqlArquiteto="select arquiteto from arquitetos where idArquiteto=$codigo";
	$queryArquiteto=mysqli_query($mysqli,$sqlArquiteto);
	$regArquiteto=mysqli_fetch_array($queryArquiteto);
	
	//Pedidos
	$sql=("select *,date_format(data,'%d/%m/%Y') as dataPedido from pedidos p JOIN arquitetos a ON p.idArquiteto=a.idArquiteto JOIN vendedores v ON p.idVendedor=v.idVendedor where p.idArquiteto='$codigo' order by p.data desc");
	$query=mysqli_query($mysqli, $sql);
	
	// total de pontos
	$sqlPontos="select sum(pontos) as total from pedidos where idArquiteto=$codigo";
	$queryPontos=mysqli_query($mysqli,$sqlPontos);
	$regPontos=mysqli_fetch_array($queryPontos);
	
	// Última Venda
	$sqlData="select date_format(data,'%d') as dia,date_format(data,'%m') as mes,date_format(data,'%Y') as ano from pedidos where idArquiteto=$codigo order by data desc limit 1";
	$queryData=mysqli_query($mysqli,$sqlData);
	$regData=mysqli_fetch_array($queryData);
	$mes_num=$regData['mes'];
	
	if($mes_num == '01'){
        $mes_nome = "JAN";
    }
	if($mes_num == '02'){
        $mes_nome = "FEV";
    }
	if($mes_num == '03'){
        $mes_nome = "MAR";
    }
	if($mes_num == '04'){
        $mes_nome = "ABR";
    }
	if($mes_num == '05'){
        $mes_nome = "MAI";
    }
	if($mes_num == '06'){
        $mes_nome = "JUN";
    }
	if($mes_num == '07'){
        $mes_nome = "JUL";
    }
	if($mes_num == '08'){
        $mes_nome = "AGO";
    }
	if($mes_num == '09'){
        $mes_nome = "SET";
    }
	if($mes_num == '10'){
        $mes_nome = "OUT";
    }
	if($mes_num == '11'){
        $mes_nome = "NOV";
    }
    if($mes_num == '12'){
        $mes_nome = "DEZ";
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <?php 
        include_once 'includes/head.php'; ?>
    </head>
    <body>
        <?php 
        include_once 'includes/header.php'; ?>

        <div class="container">
            <div class="row titulos">
                <div class="col-lg-6">
                    <p>PROFISSIONAL:<br>
                    <span><?php echo $regArquiteto['arquiteto']; ?></span></p>
                </div>
                <div class="col-lg-3">
                    <p>PONTUAÇÃO:<br>
                    <span><?php echo $regPontos['total']; ?></span></p>
                </div>
                <div class="col-lg-3">
                    <p>ÚLTIMA ATUALIZAÇÃO:<br>
                    <span><?php echo $regData['dia'] . ' ' . $mes_nome .' '. $regData['ano']; ?></span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <tr> 
                                <td height="30"><strong>Pedido</strong></td>
                                <td><strong>Cliente</strong></td>
                                <td><strong>Vendedor</strong></td>
                                <td><strong>Data</strong></td>
                                <td><strong>Valor</strong></td>
                                <td><strong>Pontos</strong></td>
                            </tr>
                                <?php
                                while ($reg=mysqli_fetch_array($query))
                                {
                                    $idPedido=$reg['idPedido'];
                                    $pedido=$reg['pedido'];
                                    $vendedor=$reg['vendedor'];
                                    $pontos=$reg['pontos'];
                                    $cliente=$reg['cliente'];
                                    $data=$reg['dataPedido'];
                                    $valor=$reg['valor'];
                                ?>
                                <tr>
                                <td height="25"><?php echo $pedido; ?></td>
                                <td><?php echo $cliente; ?></td>
                                <td><?php echo $vendedor; ?></td>
                                <td><?php echo $data; ?></td>
                                <td><?php echo $valor; ?></td>
                                <td><?php echo $pontos; ?></td>
                            </tr>
                            <?php 
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>