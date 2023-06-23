<?php 
function echoIfIssetAdmin($edit = false, $array, $index, $title, $readonly = "", $type = 'text'){
    $bg = "";
    
    if((isset($array[$index]) && (!empty($array[$index]) XOR $array[$index] == 0) && isset($title)) || $edit == 'true')
    {
        if($index === "dataCadastro" ){
           $readonly = "readonly";
         }
         if($readonly === "readonly"){
            $bg = "bgReadOnly";
         }
        echo 
        "
        <div class ='dataItemDiv'>
            <label for='$index' class='h5'>$title</label>
            <input name='input' type='$type' class='$bg' value='". $array[$index] ."' $readonly>
        </div>
        ";
        return true;

    }elseif(isset($array[$index]))
    {
        echo $array[$index];
        return true;

    } else
    {
        return false;
    }
}
?>