<?php


?>
<body>
<header>
    <div class='limiter'>
        <div class='logo_div'>
            <a href='<?php echo $url;?>'><img id='header_logo' src='<?php echo $url;?>img/logo-trancarte-branca.png' alt='logo da trançarte'></a>
        </div>
        <div class='nav-div'>
            <nav>
                <ul>
                    <li class='nav-btn <?php echo $inicio;?>'><a href='<?php echo $url;?>admin/home.php'>inicio</a></li>
                    <li class='nav-btn <?php echo $arquitetos;?>'><a href='<?php echo $url;?>admin/consultarArquiteto.php' class=''>Arquitetos</a></li>
                    <li class='nav-btn <?php echo $vendedor;?>'><a href='<?php echo $url;?>admin/consultarVendedor.php'>Vendedor</a></li>
                    <li class='nav-btn <?php echo $pedidos;?>'><a href='<?php echo $url;?>admin/consultarPedido.php'>Pedidos</a></li>
                    <li class='nav-btn <?php echo $downloads;?>'><a href='<?php echo $url;?>admin/consultarDownload.php'>Downloads</a></li>
                    <li class='nav-btn'><a href='<?php echo $url;?>sair.php'>sair</a></li>
                    <li class='nav-btn btn'><a href='#'>Ranking</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>