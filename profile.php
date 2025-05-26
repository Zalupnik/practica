<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

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
                    <h1 class="fio_h1">ФИО</h1><br>
                    <div class="fio">
                        <?= htmlspecialchars($user['full_name']) ?>
                    </div>
                </div> 
                <div class="info_block-p">
                    <h1 class="fio_h1">Номер телефона</h1><br>
                    <div class="fio">
                        89924242345
                    </div>
                </div> 
                <div class="info_block-p">
                    <h1 class="fio_h1">Email</h1><br>
                    <div class="fio">
                        petya@gmail.com
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <? include('footer.php') ?>
</body>
</html>