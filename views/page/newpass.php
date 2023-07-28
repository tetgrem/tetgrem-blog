<?php
    use App\Services\Router;
    use App\Services\Select;

    if ($_SESSION['user']) Router::redirect('/');

    $key = $_GET['key'];
    if ($key == NULL) Router::redirect('/');

    $user = Select::selectOneUser($key);
    $user = mysqli_fetch_assoc($user);

    if (!$user) Router::redirect('/');

    if (isset($_SESSION['user-forgot-password'])) {
        $_SESSION['user-forgot-password'] = null;
    }

    $_SESSION['user-forgot-password'] = ['id' => $user['ids']];

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
        <h1>Відновлення паролю</h1>
        <div class="register__block">
            <form method="post" class="needs-validation" action="/auth/newpass" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password"   class="form-control" id="password" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть пароль.
                    </div>
                    <div class="invalid-feedback-pass" style="color: red; margin-top: 10px;"></div>
                </div>
                <div class="mb-3">
                    <label for="password-new" class="form-label">Повторіть пароль</label>
                    <input type="password" name="password-new"   class="form-control" id="password-new" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть пароль.
                    </div>
                    <div class="invalid-feedback-pass" style="color: red; margin-top: 10px;"></div>
                </div>
                <button type="submit" class="register__btn btn btn-success">Змінити</button>
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