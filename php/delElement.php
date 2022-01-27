<?php 
    
    include 'connection_base.php';
    
    
    $id = json_decode(file_get_contents('php://input'));//искомый id элемента
       
    $query = "DELETE FROM `mybase_table` WHERE `mybase_table`.`id` = $id";
    $mysqli->query($query);//sql запрос на базу
    if($id){
        echo ' Удалил данный, id: ' . $id;
    }
    else {
        echo 'Операция не получилась';
    }
    
    $mysqli->close();
?>