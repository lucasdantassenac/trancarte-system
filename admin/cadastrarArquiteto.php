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
    <h1>Cadastrar arquiteto</h1>
    <form>
        <label for='photo'>Foto</label>
        <input type='file' name='photo' id='photo'>

        <label for='user'>Usuário*</label>
        <input type='text' name='user' id='user' required>

        <label for='name'>Nome completo*</label>
        <input type='text' name='name' id='name' required>
        
        <label for='cpf'>CPF/CNPJ*</label>
        <input class='i50 if' type='number' name='cpf' id='cpf' required>
        <label for='rg'>RG*</label>
        <input class='i50' type='number' name='rg' id='rg' required>
       
        <label for='pis'>PIS</label>
        <input class='i50 if' type='text' name='pis' id='pis'>
        <label for='birthday'>Data de nascimento*</label>
        <input class='i50' type='date' name='birthday' id='birthday' required>

        <label for='filiation'>Filiação*</label>
        <input type='text' name='filiation' id='filiation' required>

        <label for='phone'>Telefone celular e/ou fixo*</label>
        <input type='text' name='phone' id='phone' required>
        
        <label for='email'>E-mail*</label>
        <input type='email' name='email' id='email' required>
        
        <label for='email-premium'>E-mail casa premium*</label>
        <input type='email' name='email-premium' id='email-premium' required>
        
        <label for='adress'>Endereço completo*</label>
        <input type='text' name='adress' id='adress' required>
        
        <label for='bank'>Dados bancários*</label>
        <input type='text' name='bank' id='bank' required>
        
        <label for='password'>Senha provisória*</label>
        <input type='password' name='password' id='password' required>

        <input type='submit' class='btn' value='Cadastrar'>
    </form>
</main>

<?php
    require_once '../includes/footer.php';
?>