<?php
$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/loginPages/loginGlobal.css",
    2 => "assets/css/loginPages/loginArquiteto.css"
);
if(isset($_SESSION)){
    session_destroy();
}
require_once './includes/head.php';
if(isset($_GET['error']) && $_GET['error'] == '1'){
    echo "<script>alert('Usuário ou senha inválidos')</script>";
}
?>


<body class="login">
    <div class='overlay'></div>
    <img id='logo' src='./img/logo-trancarte-branca.png' alt='Logo da Trançarte'>
    <div class='acess-div'>
        <h1 class='h3'>Acesso do arquiteto</h1>
        <a href='./index.php'>Voltar ao início</a>
        <div class="box-login">
            <form action="architectLoginValidate.php" method="post" name="form1" >
                <input type="text" name="login" id="email" placeholder="EMAIL ou USUÁRIO"/>
                <input type="password" name="senha" id="senha" placeholder="SENHA"/>
                <input class='btn' type="submit" value="ENTRAR" /><br />
                <!--<span id="spanLogin" class="erro"><?php #echo $erro; ?></span>-->
            </form>
        </div>
    </div>
</body>
</html>