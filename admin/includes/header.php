<?php
    $sqlPedido           = "SELECT pedidos.*, arquitetos.arquiteto FROM pedidos INNER JOIN arquitetos ON pedidos.idArquiteto = arquitetos.idArquiteto WHERE pedidos.status = 'a' ORDER BY dataCadastro DESC LIMIT 5;";
    $sqlVendedor         = "SELECT * FROM vendedores WHERE status = 'a' ORDER BY vendedor DESC LIMIT 10;";
    $sqlArquiteto        = "SELECT * FROM arquitetos WHERE status = 'a' ORDER BY dataCadastro DESC LIMIT 10;";

    $sqlAllArchitects    = "SELECT * FROM arquitetos WHERE status = 'a' ORDER BY arquiteto;";
    $sqlAllSellers       = "SELECT * FROM vendedores WHERE status = 'a' ORDER BY vendedor;";
    $sqlAllOrders        = "SELECT pedidos.*, arquitetos.arquiteto FROM pedidos INNER JOIN arquitetos ON pedidos.idArquiteto = arquitetos.idArquiteto WHERE pedidos.status = 'a' ORDER BY dataCadastro DESC;";

    $selectAllarchitects = mysqli_query($mysqli, $sqlAllArchitects);
    $selectAllSellers    = mysqli_query($mysqli, $sqlAllSellers);
    $selectAllOrders     = mysqli_query($mysqli, $sqlAllOrders);

    $selecionaPedido     = mysqli_query($mysqli, $sqlPedido); 
    $selecionaArquiteto  = mysqli_query($mysqli, $sqlArquiteto); 
    $selecionaVendedor   = mysqli_query($mysqli, $sqlVendedor);
?>
<body>
<header>
    <div class='mobile-limiter'>
        <div class="burger" id="burger">
            <span class="burger-line"> </span>
            <span class="burger-line"> </span>
            <span class="burger-line"> </span>
        </div>
        <div class='logo_div_mobile'>
            <a href='<?php echo $url;?>'><img id='header_logo' src='<?php echo $url;?>img/logo-trancarte-branca.png' alt='logo da trançarte'></a>
        </div>
    </div>
       <div id='headerLimiter' class='headerHidden limiter'>
        <div class='logo_div'>
            <a href='<?php echo $url;?>'><img id='header_logo' src='<?php echo $url;?>img/logo-trancarte-branca.png' alt='logo da trançarte'></a>
        </div>
        <div class='nav-div'>
            <nav>
                <ul class='nav-links'>
                    <a href='<?php echo $url;?>admin/home.php'><li class='nav-btn <?php echo $inicio;?>'>Início</li></a>
                    <a href='<?php echo $url;?>admin/consultarArquiteto.php' class=''><li class='nav-btn <?php echo $arquitetos;?>'>Arquitetos</a></li>
                    <a href='<?php echo $url;?>admin/consultarVendedor.php'><li class='nav-btn <?php echo $vendedor;?>'>Vendedor</li></a>
                    <a href='<?php echo $url;?>admin/consultarPedido.php'><li class='nav-btn <?php echo $pedidos;?>'>Pedidos</li></a>
                    <a href='<?php echo $url;?>admin/consultarDownload.php'><li class='nav-btn <?php echo $downloads;?>'>Downloads</li></a>
                    <a href='<?php echo $url;?>sair.php'><li class='nav-btn'>Sair</li></a>
                    <a href='../ranking.php'><li class='nav-btn btn'>Ranking</li></a>
                </ul>
            </nav>
        </div>
    </div>
</header>