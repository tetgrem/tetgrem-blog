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
        <div class="add__post-link"><a href="/add-post/new-category">Запропонувати категорію...</a></div>
        <h1>Добавити публікацію</h1>
        <?php if (isset($_SESSION['message-error'])) {


            echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast fide red show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header red">
                    <strong class="me-auto">Повідомлення</strong>
                </div>
                <div class="toast-body">
                    ' . $_SESSION['message-error'] . '
                </div>
            </div>
        </div>';
            $_SESSION['message-error'] = null;
        }
        ?>
        <div class="register__block">
            <form method="post" class="needs-validation" action="/posts/add-post" novalidate enctype="multipart/form-data">
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
                    <label for="category" class="form-label">Виберіть категорію:</label>
                    <select id="category" name="category" class="form-select" aria-label="Default select example">
<!--                        <option value="another" selected>Категорія:</option>-->
                        <?php foreach ($categorys as $el) { ?>
                            <option value="<?=$el['category_id']?>"><?=$el['category_name']?></option>
                        <?php } ?>
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