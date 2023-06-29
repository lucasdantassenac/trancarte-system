<?php 
function echoIfIssetAdmin($edit = false, $array, $index, $title, $readonly = "", $type = 'text'){
    $bg = "";
    
    if((isset($array[$index]) && (!empty($array[$index]) XOR $array[$index] === 0) && isset($title)) || $edit == 'true')
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
            <input name='$index' type='$type' class='$bg' value='". $array[$index] ."' autocomplete='off' $readonly>
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

function checkIfExist($mysqli, $table, $array ){
    $exists = false;
    $existentFields = "existentFields=";
    foreach ($array as $key => $field) {
        try {
            $stmt = $mysqli->prepare("SELECT * FROM $table WHERE $key = ? AND status = 'a'");
            $stmt->bind_param('s', $field);
            $stmt->execute();
            $stmt->store_result();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        if($stmt->num_rows > 0){
            $exists = true;
            $existentFields .= "$key"."_";
        }
    }
    return [$exists, $existentFields];
}
?>