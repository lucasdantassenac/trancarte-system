
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    
    <?php
    ini_set('display_errors', 1); //development
    $url = 'https://' . rtrim($_SERVER['SERVER_NAME'], '/') . '/' ."novosistemaarquitetos/";
    if(!isset($links)){
        $links = array(
            0 => "assets/css/global.css"
        );
    }
    foreach ($links as $link) {
        echo  "<link rel='stylesheet' type='text/css' href='$url"."$link'>"; 
    }
    ?>
    
    <!--icons-->
    
    <!--user-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--building-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>