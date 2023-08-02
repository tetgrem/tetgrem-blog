<?php
    use App\Services\Select;



    $id = $_GET['id'];
    $item = Select::selectOnePost($id);
//    die(print_r($item));

    $item_user_id = mysqli_fetch_assoc($item);
    $item_user_id = $item_user_id['user_ids'];

   if (!($_SESSION['user']['user_group'] == 2 || $_SESSION['user']['user_group'] == 3))  {
       if (!$_SESSION['user'] || $_SESSION['user']['ids'] != $item_user_id) {
           \App\Services\Router::redirect('/');
       }
   }

   if (!isset($_GET['id']) || $_GET['id'] == '') \App\Services\Router::redirect('/');




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
        <h1>Редагувати публікацію</h1>
        <?php foreach ($item as $el) { ?>
            <div class="register__block">
                <form method="post" class="needs-validation" action="/posts/editPost?id=<?=$el['id']?>" novalidate enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Заголовок</label>
                        <input type="text" name="title" class="form-control" id="title" value="<?=$el['title']?>" required>
                        <div class="invalid-feedback">
                            Будь ласка, введіть заголовок.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Текст</label>
                        <textarea name="text" class="form-control" id="text"  required><?=$el['text']?></textarea>
                        <div class="invalid-feedback">
                            Будь ласка, введіть текст.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Картинка для поста</label>
                        <input type="file" name="posts_img" class="form-control" id="avatar">
                        <div class="invalid-feedback">
                            Будь ласка, виберіть картинку.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Виберіть категорію:</label>
                        <select id="category" name="category" class="form-select" aria-label="Default select example" required>
                            <option value="">Категорія зараз: <?=$el['category_name']?></option>
                            <?php foreach ($categorys as $category) { ?>
                                <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                            <?php } ?>


                        </select>
                    </div>
                    <?php if ($_SESSION['user']['user_group'] == 2 || $_SESSION['user']['user_group'] == 3) { ?>
                        <div class="mb-3">
                            <label for="status" class="form-label">Статус:</label>
                            <select id="status" name="status" class="form-select" aria-label="Default select example" required>
                                <option value="">Статус зараз: <?php if ($el['status'] == 0) { echo 'Схований'; } elseif ($el['status'] == 1) { echo 'Видний';}?></option>
                                <option value="1">Видний</option>
                                <option value="0" >Схований</option>
                            </select>
                        </div>
                    <?php } ?>
                    <button  type="submit" class="register__btn btn btn-success">Редагувати</button>
                </form>
            </div>
        <?php } ?>
    </section>
</main>

<!-- Footer -->

</body>
<?php
    require_once 'views/components/js_includes.php';
?>


</html>