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
    <h1>Cadastrar pedido</h1>
    <form>

        <label for='request'>pedido*</label>
        <input type='text' name='request' id='request' required>

        <label for='client'>Cliente*</label>
        <input type='text' name='client' id='client' required>
        
        <label for='date'>Data*</label>
        <input class='i33 imr' type='date' name='date' id='date' required>
        <label for='value'>Valor*</label>
        <input class='i33 imr' type='number' name='value' id='value' required>
        <label for='pontuation'>Pontuação*</label>
        <input class='i33 ' type='number' name='pontuation' id='pontuation' required>
        
        <label for='seller'>Vendedor*</label>
        <select name='seller' id='seller' required>
            <option><!--list sellers--></option>
        </select>
        
        <label for='architect'>Arquiteto*</label>
        <select name='architect' id='architect' required>
            <option><!--list architects--></option>
        </select>

        <input type='submit' class='btn' value='Cadastrar'>
    </form>
</main>

<?php
    require_once '../includes/footer.php';
?>