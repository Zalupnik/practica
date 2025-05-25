<?php
// Стартуем сессию в самом начале файла
session_start();

// Проверяем авторизацию
if (!isset($_SESSION['user_id'])) {
    // Если не авторизован - перенаправляем на страницу входа
    header('Location: login.php');
    exit(); // Важно завершить выполнение скрипта
}

// Пользователь авторизован - показываем профиль
require 'db.php';
$user = $conn->query("SELECT * FROM users WHERE id = {$_SESSION['user_id']}")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Аккаунт</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <? include('header.php') ?>

    <section class="section_account">
        <div class="container account">
            <div class="account_content">
                <div class="pp">
                    <h1 class="h1 h1_delivery">Личный кабинет</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section_info">
        <div class="container account">
            <div class="container_contact_block">
                <div class="info_block-p">
                    <div class="info_block_p-content one_cont">
                        <h1>Добро пожаловать, <?= htmlspecialchars($user['full_name']) ?>!</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? include('footer.php') ?>
</body>
</html>