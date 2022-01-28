<?php
    include 'connection_base.php';

    //Получаю последний ID
    //если бы до этого вставлял данные, то можно было бы
    // использовать $mysqli->insert_id
    $id = $mysqli->query("SELECT max(id) FROM mybase_table");
    $id =  mysqli_fetch_assoc($id);
    $id =  $id['max(id)'];

    $result = $mysqli->query("SELECT * FROM mybase_table WHERE ID = $id");//последнюю запись
    $data = mysqli_fetch_assoc($result);

    echo 'Последняя запись';
    echo json_encode($data);
    
    $mysqli->close();
?>
