<?php
include 'db.php';
include 'header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $conn->real_escape_string($_SESSION['user_id']);
$sql = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
    session_destroy();
    header('Location: login.php');
    exit();
}

$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['full_name']) || empty($_POST['login'])) {
        $error = 'Заполните все обязательные поля!';
    } else {
        $full_name = $conn->real_escape_string($_POST['full_name']);
        $login = $conn->real_escape_string($_POST['login']);
        
        if (!empty($_POST['password'])) {
            if ($_POST['password'] !== $_POST['password_confirm']) {
                $error = 'Пароли не совпадают!';
            } else {
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $sql = "UPDATE users SET full_name = '$full_name', login = '$login', password = '$password' WHERE id = '$user_id'";
            }
        } else {
            $sql = "UPDATE users SET full_name = '$full_name', login = '$login' WHERE id = '$user_id'";
        }
        
        if (!isset($error)) {
            if ($conn->query($sql)) {
                $success = 'Профиль успешно обновлен!';
                $user['full_name'] = $full_name;
                $user['login'] = $login;
            } else {
                $error = 'Ошибка обновления профиля: ' . $conn->error;
            }
        }
    }
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <section class="section_form bebe">
        <div class="container_form profile_form">
            <div class="form-content profile-content">
                <div class="container_content-form byby">
                    <div class="h1_login">
                        <h1>Профиль пользователя</h1>
                    </div>
                    
                    <?php if (isset($success)): ?>
                        <div class="alert success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($error)): ?>
                        <div class="alert error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    
                    <form action="#" method="POST">
                        <div class="form-group">
                            <input type="text" name="full_name" placeholder="ФИО" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="login" placeholder="Логин" value="<?php echo htmlspecialchars($user['login']); ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Новый пароль (оставьте пустым, если не хотите менять)">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password_confirm" placeholder="Повторите новый пароль">
                        </div>
                        <button type="submit">Обновить профиль</button>
                    </form>
                    <p><a class="form_a" href="logout.php">Выйти из аккаунта</a></p>
                </div>
            </div>
        </div>
    </section>
    <?include 'footer.php';?>
</body>
</html>