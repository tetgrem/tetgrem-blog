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
        <h1>Відновлення паролю</h1>
        <div class="register__block">
            <?php if (!$_SESSION['forgot-pass']) { ?>
            <form method="post" class="needs-validation" action="/auth/forgot-password" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="email" class="form-label">Введіть свій email, на який буде відправлено лист</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть свій email.
                    </div>
                </div>
                <button type="submit" class="register__btn btn btn-success">Відправити</button>
            </form>
            <?php } else { ?>
            <span><?=$_SESSION['forgot-pass']?></span>
            <?php $_SESSION['forgot-pass'] = null; ?>
                <script>setTimeout(() => window.location.href = 'http://tetgrem.com/', 3000)</script>
            <?php
                }
            ?>
        </div>
    </section>
</main>

<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>
</html>