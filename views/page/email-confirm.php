<?php
use App\Services\Select;
use App\Services\Router;
use App\Services\DB_connect;

    if ($_SESSION['user']) {
       Router::redirect('/');
    }

    $email_key = $_GET['emailkey'];
    if ($email_key == NULL) Router::redirect('/');

    $user = Select::selectOneUser($email_key);
    $user = mysqli_fetch_assoc($user);

    $id = $user['ids'];

    if (!$user) Router::redirect('/');

    mysqli_query(DB_connect::db_connect(), "UPDATE `users` SET `email_confirm` = NULL WHERE `users`.`ids` = '$id'")



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
        <h1>Дякуємо! Email підтверджений!</h1>
        <script>setTimeout(() => window.location.href = 'http://tetgrem.com/login', 2000)</script>
    </section>
</main>

<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>
</html>