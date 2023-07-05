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
        <div class="register__block">
            <form method="post" class="needs-validation" action="" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email або Логін</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" required>
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
                <button type="submit" class="register__btn btn btn-success">Увійти</button>
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