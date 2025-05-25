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
                    <? if (isset($_SESSION['user_id'])): ?>
                        <a href="logout.php">Выход</a>
                    <?php else: ?>
                        <a href="login.php">Войти</a> | 
                        <a href="register.php">Регистрация</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="container nav_block">
            <div class="nav_block--two">
                <a href="index.php" class="block_logo_name">
                    <img src="img/Light.png">
                </a>
                <a href="#" class="catalog_h">
                    <div class="catalog_block">
                        <img src="img/Icon.svg">
                    </div>Каталог
                </a>
                <div class="nav_link">
                    <a href="profile.php">
                        <div class="nav_link_block">
                            <img src="img/Icon (2).png" alt="profile">Профиль
                        </div>
                    </a>

                    <a href="#">
                        <div class="nav_link_block">
                            <img src="img/Icon (3).png" alt="profile">Заказы
                        </div>
                    </a>

                    <a href="#">
                        <div class="nav_link_block">
                            <img src="img/Icon (4).png" alt="profile">Корзина
                        </div>
                    </a>
                </div>
            </div>
            <div class="nav_block--three">
                <div class="nav_link">
                    <a href="#">Акции</a>
                    <a href="#">Строительные материалы</a>
                    <a href="#">Керамическая плитка</a>
                    <a href="#">Краски</a>
                    <a href="#">Сантехника</a>
                    <a href="#">Напольные покрытия</a>
                    <a href="#">Инструменты</a>
                    <a href="#">Обои</a>
                    <a href="#">Окна</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>