<?php
if (!$_SESSION['user']) \App\Services\Router::redirect('/login');

use App\Services\Select;

$categorys = Select::selectAllCategorys();
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
        <h1>Запропонувати нову категорію</h1>
        <div class="register__block">
            <form method="post" class="needs-validation" action="/posts/add-post-new-category" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть заголовок.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="editor" class="form-label">Текст</label>
                    <textarea name="text" class="form-control" id="editor" required></textarea>
                    <div class="invalid-feedback">
                        Будь ласка, введіть текст.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Картинка для поста</label>
                    <input type="file" name="posts_img" class="form-control" id="avatar" required>
                    <div class="invalid-feedback">
                        Будь ласка, виберіть картинку.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="new_category" class="form-label">Бажана назва категорії:</label>
                    <input type="text" name="new_category" class="form-control" id="new_category" required>
                    <div class="invalid-feedback">
                        Будь ласка, введіть назву.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="comment" class="form-label">Добавте коментар:</label>
                    <textarea name="comment" class="form-control" id="comment" placeholder="чому має бути добавлена саме ця категорія..." required></textarea>
                    <div class="invalid-feedback">
                        Будь ласка, введіть текст.
                    </div>
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