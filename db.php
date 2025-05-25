<?php
  $conn = new mysqli('MySQL-8.2','root','', 'bryukhov',);

    if($conn->connect_error) {
        die("Нет подключения к базе данных: " . $conn->connect_error);
    }
?>