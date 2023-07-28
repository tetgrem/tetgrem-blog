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
        <h1>Вхід</h1>
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
            <form method="post" class="needs-validation" action="/auth/login" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="data" class="form-label">Email або Логін</label>
                    <input type="text" name="data" class="form-control" id="data" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть свій email або логін.
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
                <div class="login__btns">
                    <button type="submit" class="register__btn btn btn-success">Увійти</button>
                    <a href="/forgot-password">Забули пароль?</a>
                </div>
            </form>
        </div>
    </section>
</main>

<!-- Footer -->

</body>
<?php
    require_once 'views/components/js_includes.php';
?>
</html>