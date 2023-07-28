<?php
    if ($_SESSION['user']) {
        \App\Services\Router::redirect('/');
    }




    $link = 'https://' . $_SESSION['email-for-link'];

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
        <h1>Будь ласка, для входу на сайт підтвердіть свій Email</h1>
        <a href="<?=$link?>">Перейти на: <?=$_SESSION['email-for-link']?></a>

    </section>
</main>

<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>
</html>
