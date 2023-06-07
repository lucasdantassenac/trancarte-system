<?php 
function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}


function formatTime($format, $date){
  $phptime = strtotime($date);
  return date($format, $phptime);
}


function echoIfIsset($array, $index, $title){
  
  if(isset($array[$index]) && isset($title)){
    echo "<h4 class='h5'>$title</h4>
          <p>".$array[$index]."</p>";
    return true;

  }elseif(isset($array[$index])){
    echo $array[$index];
    return true;

  } else{
    return false;
  }
}
?>