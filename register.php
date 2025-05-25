<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['password_confirm']) || empty($_POST['full_name'])) {
        die('Заполните все обязательные поля!');
    }

    if ($_POST['password'] !== $_POST['password_confirm']) {
        die('Пароли не совпадают!');
    }

    $login = $conn->real_escape_string($_POST['login']);
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (login, password, full_name) VALUES ('$login', '$password', '$full_name')";
    
    if ($conn->query($sql)) {
        header('Location: login.php');
        exit();
    } else {
        die('Ошибка регистрации: ' . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <section class="section_form">
        <div class="container_form register_form">
            <div class="form-content">
                <div class="container_content-form">
                    <div class="h1_login">
                        <h1>Регистрация</h1>
                    </div>
                    <form action="POST">
                        <div class="form-group">
                            <input type="text" name="full_name" placeholder="ФИО" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="login" placeholder="Логин" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Пороль" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirm" placeholder="Повтор пороля" required>
                        </div>
                        <button type="submit">Зарегистрироваться</button>
                    </form>
                    <p>Уже есть аккаунт? <a href="login.php">Войти</a></p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>