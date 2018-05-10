<?php

require_once 'config.php';

$sql="SELECT * FROM texty";
$run=mysqli_query($link, $sql); 

while($row=$run->fetch_assoc()){
    $id = $row['id_text'];

    if(isset($_POST[$id])){
        //echo "TRUE";
    $sql="UPDATE texty SET value=1 WHERE id_text=$id";
    mysqli_query($link,$sql);
    }else{
        //echo "FALSE";
        $sql="UPDATE texty SET value=0 WHERE id_text=$id";
        mysqli_query($link,$sql);
    }
    


}
header("location: welcome.php");
exit;

?>