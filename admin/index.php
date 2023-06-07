<?php
$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/loginPages/loginGlobal.css",
    2 => "assets/css/loginPages/loginArquiteto.css"
);
require_once '../includes/head.php';
$erro = "";

?>


<body class="login">
    <div class='overlay'></div>
    <img id='logo' src='../img/logo-trancarte-branca.png' alt='Logo da Trançarte'>
    <div class='acess-div'>
        <h1 class='h3'>Acesso do Administrador</h1>
        <div class="box-login">
            <form action="./verificaLogin.php" method="post" name="form1" >
                <input type="text" name="login" id="login" placeholder="LOGIN"/>
                <input type="password" name="senha" id="senha" placeholder="SENHA"/>
                <input class='btn' type="submit" value="ENTRAR" /><br />
                <span id="spanLogin" class="erro"><?php echo $erro; ?></span>
            </form>
        </div>
    </div>
</body>
</html>