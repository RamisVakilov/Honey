<?php
//Получаю все данные из таблицы и преобразую их в json формат
    include 'connection_base.php';
     //извлекаю данные из mysql
    $result = $mysqli->query("SELECT * FROM mybase_table");

    $data = [];
    while($row = mysqli_fetch_assoc($result)){
        $data[]=$row;
         }
    echo 'Занёс данные в базу данных';     
    echo json_encode($data);

    $mysqli->close();
?>