<?php
     ini_set('max_execution_time', 300); //300 seconds = 5 minutes
     $mysqli = new mysqli('localhost','root','','mybase');//создание объекта и подключение к базе mysql
     $mysqli->set_charset('utf8');//выбор кодировки
 
     if(mysqli_connect_errno()){//проверяем подключение к базе данных
         printf('Соединение не установленно', mysqli_connect_error());
         exit('Что то пошло не так');//прекращение работы скрипта
     }
?>