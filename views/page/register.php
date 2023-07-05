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
        <div class="register__block">
            <form method="post" class="needs-validation" action="" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть свій email.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Логін</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                    <div class="invalid-feedback">
                        Будь ласка, виберіть логін.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Ім'я</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" required>
                    <div class="invalid-feedback">
                        Будь-ласка, введіть своє ім'я.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Прізвище</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть своє прізвище.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Аватар профілю</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" required>
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
                <button disabled type="submit" class="register__btn btn btn-success">Реєстрація</button>
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