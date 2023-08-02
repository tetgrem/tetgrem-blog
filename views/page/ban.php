

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title . ' - Tetgrem.com'?></title>
    <link rel="icon" href="http://tetgrem.com/img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="http://tetgrem.com/assets/css/style.css">
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
    <h1>Ви забанені. Всього доброго!</h1>
</div>
<!-- Footer -->

</body>
<?php
require_once 'views/components/js_includes.php';
?>



</html>