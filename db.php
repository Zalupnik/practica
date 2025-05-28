<?php
  $conn = new mysqli('localhost','root','', 'bryukhov',);

    if($conn->connect_error) {
        die("Нет подключения к базе данных: " . $conn->connect_error);
    }
?>