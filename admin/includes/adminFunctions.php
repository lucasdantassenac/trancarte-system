<?php 
function echoIfIssetAdmin($array, $index, $title, $readonly = "", $type = 'text',){

    if(isset($array[$index]) && !empty($array[$index]) && isset($title))
    {
        echo 
        "
        <div class ='data-div'>
            <label for='$index' class='h5'>$title</label>
            <input name='input' type='$type' value=". $array[$index] ."'$readonly>
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