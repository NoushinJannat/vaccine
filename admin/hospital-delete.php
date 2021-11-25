<?php

include "inc/connection.php";
$receive_id = $_GET['id'];
$query = "DELETE FROM hospitals_info WHERE hospital_id = '{$receive_id}'";
$result = mysqli_query($connection,$query);

if($result == true){
    header("location: hospital-table.php");
}else{
    echo "Can't Delete Menu.";
}

mysqli_close($connection);

?>