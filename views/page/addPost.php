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
        <h1>Добавити публікацію</h1>
        <div class="register__block">
            <form method="post" class="needs-validation" action="" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть заголовок.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Текст</label>
                    <textarea name="text" class="form-control" id="text" required></textarea>
                    <div class="invalid-feedback">
                        Будь ласка, введіть текст.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Картинка для поста</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" required>
                    <div class="invalid-feedback">
                        Будь ласка, виберіть картинку.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Виберіть категорію:</label>
                    <select id="category" name="category" class="form-select" aria-label="Default select example">
                        <option value="another" selected>Інше</option>
                        <option value="another">JavaScript</option>
                        <option value="another">Інше</option>
                        <option value="another">Інше</option>
                        <option value="another">Інше</option>
                        <option value="another">Інше</option>
                    </select>
                </div>
                <button  type="submit" class="register__btn btn btn-success">Добавити</button>
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