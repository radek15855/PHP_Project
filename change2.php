<?php

require_once 'config.php';

$sql="SELECT * FROM images";
$run=mysqli_query($link, $sql); 

while($row=$run->fetch_assoc()){
    $id = $row['id_img'];

    if(isset($_POST[$id])){
        //echo " TRUE";
    $sql="UPDATE images SET checkbox=1 WHERE id_img=$id";
    mysqli_query($link,$sql);
    }else{
        //echo " FALSE";
        $sql="UPDATE images SET checkbox=0 WHERE id_img=$id";
        mysqli_query($link,$sql);
    }
    


}
header("location: welcome.php");
exit;

?>