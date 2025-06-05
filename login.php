<?php
require 'db.php';

session_start();
$empty = false;
$password = false;
$login = false;
if (isset($_SESSION['user_id'])) {
    header('Location: profile.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['login']) || empty($_POST['password'])) {
        $empty = true;
    }

    $login = $conn->real_escape_string($_POST['login']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_login'] = $user['login'];
            $_SESSION['user_full_name'] = $user['full_name'];
            
            header('Location: profile.php');
            exit();
        } else {
           $password = true;
        }
    } else {
        $login = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <section class="section_form">
        <div class="container_form login_form">
            <div class="form-content">
                <div class="container_content-form">
                    <div class="h1_login">
                        <h1>Вход</h1>
                    </div>
                    
                    
                    <form action="#" method="POST">
                        <div class="form-group">
                            <input type="text" name="login" placeholder="Логин" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Пароль" required>
                        </div>
                        <? if ($empty === true): ?>
                            <div class="error">Заполните поля</div>
                        <? endif; ?>
                        <? if ($password === true): ?>
                            <div class="error">Неверный пароль</div>
                        <? endif; ?>
                        <? if ($login === true): ?>
                            <div class="error">Пользователь с таким логином не существует</div>
                        <? endif; ?>
                        <button type="submit">Войти</button>
                    </form>
                    
                    <p>Ещё нет аккаунта? <a class="form_a" href="register.php">Зарегистрироваться</a></p>
                </div>  
            </div>
        </div>
    </section>
</body>
</html>