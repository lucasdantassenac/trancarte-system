<?php
    $links = array(
        0 => "assets/css/global.css",
        1 => "assets/css/loginPages/loginGlobal.css",
        2 => "assets/css/loginPages/index.css"
    );
    require_once './includes/head.php';
?>

<body class="login">
    <div class='overlay'></div>
    <img id='logo' src='./img/logo-trancarte-branca.png' alt='Logo da Trançarte'>
    <div class='acess-div'>
        <h1 class='h3'>Área do arquiteto</h1>
        <div class='btn-area'>
            <div class='scale-div'>
                <a class='btn row' href='./loginArquiteto.php'>
                    <div class='col c20'><span class="material-symbols-outlined">person</span></div>
                    <div class='col c70 tc b'>  Arquiteto</div>
                </a>
            </div>
            <div class='scale-div'>
                <a class='btn' href='./admin/index.php'>
                    <div class='col c20'><span class="material-symbols-outlined">apartment</span> </div>
                    <div class='col c70 tc b'>  Administrativo</div>
                </a>
            </div>
        </div>
    </div>
    
</body>
</html>