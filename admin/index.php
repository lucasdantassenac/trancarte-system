<?php
$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/loginPages/loginGlobal.css",
    2 => "assets/css/loginPages/loginArquiteto.css"
);
require_once '../includes/head.php';
if(isset($_GET['error']) && $_GET['error'] == '1'){
    echo "<script>alert('Usuário ou senha inválidos')</script>";
}
?>


<body class="login">
    <div class='overlay'></div>
    <img id='logo' src='../img/logo-trancarte-branca.png' alt='Logo da Trançarte'>
    <div class='acess-div'>
        <h1 class='h3'>Acesso do Administrador</h1>
        <a href='../index.php'>Voltar ao início</a>

        <div class="box-login">
            <form action="./verificaLogin.php" method="post" name="form1" >
                <input type="text" name="login" id="login" placeholder="LOGIN"/>
                <input type="password" name="senha" id="senha" placeholder="SENHA"/>
                <input class='btn' type="submit" value="ENTRAR" /><br />
            </form>
        </div>
    </div>
</body>
</html>