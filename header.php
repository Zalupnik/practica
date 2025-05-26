<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="nav_block--one">
            <div class="container navbar">
                <div class="nav_moscow">
                    <div class="img_mesto">
                        <img src="img/mesto.png" alt="moscow">
                    </div>
                    <div class="moscow">Москва</div>
                </div>
                <div class="nav_link">
                    <a href="delivery.php">Доставка</a>
                    <a href="refund.php">Возврат</a>
                    <a href="docs.php">Документация</a>
                    <a href="contact.php">Контакты</a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php">Выход</a>
                    <?php else: ?>
                        <div class="a_header">
                            <a href="login.php">Войти</a>|<a href="register.php">Регистрация</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container nav_block">
            <div class="nav_block--two">
                <a href="index.php" class="block_logo_name">
                    <img src="img/Light.png">
                </a>
                <div class="nav_link">
                    <a href="profile.php">
                        <div class="nav_link_block">
                            <img src="img/Icon (2).png" alt="profile">Профиль
                        </div>
                    </a>

                    <a href="index.php #populary_catergory">
                        <div class="nav_link_block">
                            <img src="img/Icon (3).png" alt="profile">Популярные категории
                        </div>
                    </a>
                </div>
            </div>
            <div class="nav_block--three">
                <div class="nav_link">
                    <a href="index.php #sale">Акции</a>
                    <a href="index.php #pop_cat">Строительные материалы</a>
                    <a href="index.php #pop_cat">Керамическая плитка</a>
                    <a href="index.php #pop_cat">Краски</a>
                    <a href="index.php #pop_cat">Сантехника</a>
                    <a href="index.php #populary_catergory">Напольные покрытия</a>
                    <a href="index.php #populary_catergory">Инструменты</a>
                    <a href="index.php #pop_cat">Обои</a>
                    <a href="index.php #pop_cat ">Окна</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>