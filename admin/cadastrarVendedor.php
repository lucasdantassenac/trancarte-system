<?php
ini_set('session.gc_maxlifetime', 3600); // 1 hora
ini_set('session.cookie_lifetime', 3600);
session_start();

$codigo = $_SESSION["codigo"];

if(!isset($codigo))
{
    header("Location: ./index.php?erro=1");
}

$links = array(
    0 => "assets/css/global.css",
    1 => "assets/css/header.css",
    3 => "assets/css/pageStyles/cadastrarA.css"
);
require_once '../includes/head.php';
include_once 'includes/header.php'; 
?>
<main>
    <h1>Cadastrar vendedor</h1>
    <form>

        <label for='user'>Usuário*</label>
        <input type='text' name='user' id='user' required>

        <label for='name'>Nome completo*</label>
        <input type='text' name='name' id='name' required>
        
        <label for='cpf'>CPF*</label>
        <input type='number' name='cpf' id='cpf' required>

        <label for='phone'>Telefone*</label>
        <input type='text' name='phone' id='phone' required>
        
        <label for='email'>E-mail*</label>
        <input type='email' name='email' id='email' required>
        
        <label for='password'>Senha provisória*</label>
        <input type='password' name='password' id='password' required>

        <input type='submit' class='btn' value='Cadastrar'>
    </form>
</main>

<?php
    require_once '../includes/footer.php';
?>