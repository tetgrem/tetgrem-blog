<?php
if ($_SESSION['user']) \App\Services\Router::redirect('/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once 'views/components/header.php';
    ?>
</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        passCheck()
    });
</script>
<body class="main__body">
<!-- Header -->
<header>
    <!-- Navbar -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <?php
                    require_once 'views/components/navbar.php';
                ?>
            </div>
        </div>
    </div>
</header>
<!-- Main Page -->

<main class="container">
    <section class="profile__section register__section">
        <h1>Реєстрація</h1>
        <?php if (isset($_SESSION['message-error'])) {


            echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast fide red show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header red">
                    <strong class="me-auto">Повідомлення</strong>
                </div>
                <div class="toast-body">
                    ' . $_SESSION['message-error'] . '
                </div>
            </div>
        </div>';
            $_SESSION['message-error'] = null;
        }
        ?>
        <div class="register__block">
            <form method="post" class="needs-validation" action="/auth/register" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['test']['email'];  ?>" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть свій email.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Логін</label>
                    <input type="text" name="username" class="form-control" id="username" pattern="^[a-zA-Z0-9]+$" value="<?php echo $_SESSION['test']['username'];  ?>" maxlength="20" required>
                    <div class="invalid-feedback">
                        Будь ласка, виберіть логін.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Ім'я</label>
                    <input type="text" name="first_name" pattern="^[A-Za-zА-Яа-яЁёЇїІіЄєҐґ]+$" class="form-control" value="<?php echo $_SESSION['test']['first_name'];  ?>" id="first_name" required>
                    <div class="invalid-feedback">
                        Будь-ласка, введіть своє ім'я.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Прізвище</label>
                    <input type="text" name="last_name" pattern="^[A-Za-zА-Яа-яЁёЇїІіЄєҐґ]+$" class="form-control" value="<?php echo $_SESSION['test']['last_name'];  ?>" id="last_name" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть своє прізвище.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Аватар профілю</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" value="/img/avatar-placeholder.png" >
                    <div class="invalid-feedback">
                        Будь ласка, виберіть собі аватар.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password"   class="form-control" id="password" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть пароль.
                    </div>
                    <div class="invalid-feedback-pass" style="color: red; margin-top: 10px;"></div>
                </div>
                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Підтвердження паролю</label>
                    <input type="password" name="password_confirm" class="form-control" id="password_confirm" required>
                    <div class="invalid-feedback">
                        Будь ласка, повторіть пароль.
                    </div>
                    <div class="invalid-feedback-pass-conf" style="color: red; margin-top: 10px;"></div>
                </div>
                <div class="login__btns">
                    <button type="submit" disabled class="register__btn btn btn-success">Реєстрація</button>
                    <a href="/login">Вже маєте аккаунт? Увійти</a>
                </div>
            </form>
            <?php $_SESSION['test'] = null ?>
        </div>
    </section>
</main>

<!-- Footer -->
<?php
require_once 'views/components/js_includes.php';
?>

</body>


</html>