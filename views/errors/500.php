

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'views/components/header.php';
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            passCheck()
        });
    </script>
</head>
<body class="main__body body__404">
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
<div class="block_404">
    <img src="https://miro.medium.com/v2/resize:fit:750/0*yDw3n0dGz2UE6HfE." alt="">
    <h1>500 - сталася помилка на сервері</h1>
    <h2><?=$error_info?></h2>
    <a href="/">На головну</a>
</div>
<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>
</html>