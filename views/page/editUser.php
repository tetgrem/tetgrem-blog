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
        <h1>Редагувати користувача</h1>
        <div class="register__block">
            <form method="post" class="needs-validation" action="" novalidate enctype="multipart/form-data">
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
                    <label for="status" class="form-label">Група:</label>
                    <select id="status" name="status" class="form-select" aria-label="Default select example">
                        <option value="1" selected>Користувач</option>
                        <option value="2" >Модератор</option>
                        <option value="3" >Адмін</option>
                    </select>
                </div>
                <button  type="submit" class="register__btn btn btn-success">Редагувати</button>
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