<?php
try {
$connection = mysqli_connect("localhost","root","","bdmw");
}catch(Exception $e){
    echo"Could not connect to the database";
}
?>