<?php
    //заношу все данные из формы и возвращаю последний элемент в json
    include 'connection_base.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];
    $query ="INSERT INTO `mybase_table` (`name`, `mail`, `message`) 
                   VALUES ('$name','$email','$message')";
    $mysqli->query($query);//sql запрос на базу
   // $data = [];
    // while($row = mysqli_fetch_assoc($result)){
    //     $data[]=$row;
    //      }
    // echo json_encode($data);
    echo 'Данные занёс';     
    $mysqli->close();
?>