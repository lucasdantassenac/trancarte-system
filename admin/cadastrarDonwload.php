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
    <h1>Cadastrar download</h1>
    <form enctype="multipart/form-data" method='post' action='./includes/addFile.php'>
        <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
        <label for='fileName'>Nome do arquivo*</label>
        <input type='text' name='fileName' id='fileName' required>
        
        <label for='file'>Arquivo*</label>
        <input type='file' name='file' id='file' required>


        <input type='submit' class='btn' value='Cadastrar'>
    </form>
</main>

<?php
    require_once '../includes/footer.php';
?>