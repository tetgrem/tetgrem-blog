<?php
    if (!$_SESSION['user'] || $_SESSION['user']['user_group'] != 3) \App\Services\Router::redirect('/');

    use App\Services\Select;
    use App\Services\UserInfo;



    $items_hidden = Select::selectAllPostsWithStatusAdmin('0');
    $items = Select::selectAllPosts();

    $items_on_check = Select::selectAllPostsWithStatusAdmin('2');

    $count_all = Select::selectAllCount();
    $count_all = mysqli_fetch_assoc($count_all);

    $count_all_users = Select::selectCountOfUsers();
    $count_all_users = mysqli_fetch_assoc($count_all_users);

    $count_posts_with_zero_status = Select::selectCountOfPostsWithStatus('0');
    $count_posts_with_zero_status = mysqli_fetch_assoc($count_posts_with_zero_status);

    $count_posts_with_second_status = Select::selectCountOfPostsWithStatus('2');
    $count_posts_with_second_status = mysqli_fetch_assoc($count_posts_with_second_status);


$users = Select::selectAllUsers();

    $categorys = Select::selectAllCategorys()

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        require_once 'views/components/header.php';
    ?>


</head>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        categoryCheck()
    });
</script>
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
    <section class="profile__section">
        <h1>Адмін-панель</h1>
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
        <?php if (isset($_SESSION['message'])) {
            echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
                     <div id="liveToast" class="toast fide show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <strong class="me-auto">Повідомлення</strong>
                            </div>
                            <div class="toast-body">
                                ' . $_SESSION['message'] . '
                            </div>
                        </div>
                    </div>';
            $_SESSION['message'] = null;
        }
        ?>
        <div class="admin__block">
            <!-- Nav tabs -->
            <!-- Nav tabs -->
            <div>
                <!-- Навигация -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#home" class="nav-link active"    aria-controls="home" role="tab" data-toggle="tab">Загальна статистика</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#profile"  class="nav-link"  aria-controls="profile" role="tab" data-toggle="tab">Всі пости</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#messages"  class="nav-link"  aria-controls="messages" role="tab" data-toggle="tab">Користувачі</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#settings"  class="nav-link"  aria-controls="settings" role="tab" data-toggle="tab">Перевірка постів <span class="badge bg-primary rounded-pill"><?=$count_posts_with_zero_status['COUNT(*)']?></span></a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#category"  class="nav-link"  aria-controls="settings" role="tab" data-toggle="tab">Категорії</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#new-category"  class="nav-link"  aria-controls="settings" role="tab" data-toggle="tab">Запропоновані категорії <span class="badge bg-primary rounded-pill"><?=$count_posts_with_second_status['COUNT(*)']?></span></a>
                    </li>
                </ul>
                <!-- Содержимое вкладок -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <ul class="list-group list-group-admin">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Постів на сайті:
                                <span class="badge bg-primary rounded-pill"><?=$count_all['COUNT(*)']?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Зареєстровано користувачів:
                                <span class="badge bg-primary rounded-pill"><?=$count_all_users['COUNT(*)']?></span>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <ul class="list-group list-group-admin-posts">
                            <?php foreach ($items as $item) { ?>
                                <li class="list-group-item list-group-item-admin align-items-center">
                                    <div>
                                        <?=mb_strimwidth($item['title'], 0, 31, '...')?>
                                    </div>
                                    <div>
                                        <span><?=$item['first_name']?> <?=$item['last_name']?> | </span>
                                        <a href="/@<?=$item['username']?>">@<?=$item['username']?></a>
                                    </div>
                                    <div>
                                        <span>Статус:</span>
                                        <?php if ($item['status'] == '1') { ?>
                                            <span style="color: green">Видний</span>
                                        <?php } elseif ($item['status'] == '2') { ?>
                                            <span style="color: #de6f00">Запропонований</span>
                                        <?php } else { ?>
                                            <span style="color: red">Схований</span>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <a href="<?=$item['link']?>">Подивитись</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        <ul class="list-group list-group-admin-posts">
                            <?php foreach ($users as $user) { ?>
                                <li class="list-group-item list-group-item-admin d-flex justify-content-between align-items-center">
                                    <div>
                                        <?=$user['first_name']?> <?=$user['last_name']?>
                                    </div>
                                    <div>
                                        <a href="/@<?=$user['username']?>">@<?=$user['username']?></a>
                                    </div>
                                    <div>
                                        <span>Група:</span>
                                        <?php
                                        $user_group = 'Користувач';
                                        $red = false;

                                        if ($user['user_group'] == 2) {
                                            $user_group = 'Модератор';
                                        }
                                        elseif ($user['user_group'] == 3) {
                                            $user_group = 'Адмін';
                                        }
                                        elseif ($user['user_group'] == 5) {
                                            $user_group = 'Забанений';
                                            $red = true;
                                        }
                                        ?>
                                        <span style="color: <?= $red ? 'red' : 'black' ?>"><b><?= $user_group ?></b></span>
                                    </div>
                                    <div>
                                        <span>Кількість постів:</span>
                                        <?php $count_of_posts = UserInfo::countOfPosts($user['ids']); ?>
                                        <span><b><?=$count_of_posts?></b></span>
                                    </div>
                                    <div>
                                        <a href="/@<?=$user['username']?>">Профіль</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">
                        <ul class="list-group list-group-admin-posts">
                           <?php foreach ($items_hidden as $item) { ?>
                               <li class="list-group-item list-group-item-admin d-flex justify-content-between align-items-center">
                                   <div>
                                       <?=mb_strimwidth($item['title'], 0, 27, '...')?>
                                   </div>
                                   <div>
                                       <span><?=$item['first_name']?> <?=$item['last_name']?> | </span>
                                       <a href="/@<?=$item['username']?>">@<?=$item['username']?></a>
                                   </div>
                                   <div>
                                       <span>Статус:</span>
                                       <span style="color: red">Схований</span>
                                   </div>
                                   <div>
                                       <a href=" <?=$item['link']?>">Подивитись</a>
                                   </div>
                               </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="category">
                        <h1>Категорії сайту:</h1>
                        <?php foreach ($categorys as $category) { ?>
                            <div class="category__item">
                                <div class="category__name">
                                    <span>Назва: <b><?=$category['category_name']?></b></span>
                                </div>
                                <div class="category__con"></div>
                                <div class="category__link">
                                    <span>Link: <b><?=$category['category_link']?></b></span>
                                </div>
                                <div class="category__con"></div>
                                <div class="category__btns">
                                    <button type="button"  class="btn btn-warning" data-toggle="modal" data-target="#<?php echo $category['category_id']?>">
                                        Редагувати
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $category['category_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Редагування категорії: <?=$category['category_name']?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" class="needs-validation" action="/admin/category/edit?link=<?=$category['category_link']?>&name=<?=$category['category_name']?>" novalidate enctype="multipart/form-data">
                                                        <div class="mb-3">
                                                            <label for="category_name" class="form-label">Назва</label>
                                                            <input type="text" name="category_name" class="form-control" id="category_name" value="<?=$category['category_name']?>" minlength="2" required>
                                                            <div class="invalid-feedback">
                                                                Будь ласка, введіть назву.
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="category_link" class="form-label">Лінк</label>
                                                            <input type="text" name="category_link" class="form-control" value="<?=$category['category_link']?>" id="category_link" minlength="2" required>
                                                            <div class="invalid-feedback">
                                                                Будь ласка, введіть лінк.
                                                            </div>
                                                            <div class="invalid-feedback-pass-conf" style="color: red; margin-top: 10px;"></div>
                                                        </div>
                                                        <button type="submit" class="category__btn btn btn-success">Редагувати</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $category['category_name']?>">
                                        Видалити
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo $category['category_name']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Ви дійсно бажаєте видалити цю категорію?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Ви збираєтесь видалити категорію <?php echo $category['category_name']?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                                    <form action="/admin/category/delete?link=<?php echo $category['category_link']?>" method="post">
                                                        <button type="submit"  class="btn btn-danger">Видалити</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <h1 class="add_category_h1">Добавити категорію</h1>
                        <form class="category-form" action="/admin/category/add" method="post">
                            <div class="mb-3">
                                <label for="category_name1" class="form-label">Назва:</label>
                                <input type="text" name="category_name" class="form-control" id="category_name1" required>
                                <div class="invalid-feedback">
                                    Будь ласка, введіть назву.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="category_link1" class="form-label">Лінк:</label>
                                <input type="text" name="category_link" class="form-control" id="category_link1" required>
                                <div class="invalid-feedback">
                                    Будь ласка, введіть лінк.
                                </div>
                            </div>
                            <button type="submit" disabled class="btn btn-success category__btn1">Добавити</button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="new-category">
                        <ul class="list-group list-group-admin-posts">
                            <?php foreach ($items_on_check as $item) { ?>
                                <li class="list-group-item list-group-item-admin d-flex justify-content-between align-items-center">
                                    <div>
                                        <?=mb_strimwidth($item['title'], 0, 27, '...')?>
                                    </div>
                                    <div>
                                        <span><?=$item['first_name']?> <?=$item['last_name']?> | </span>
                                        <a href="/@<?=$item['username']?>">@<?=$item['username']?></a>
                                    </div>
                                    <div>
                                        <span>Статус:</span>
                                        <span style="color: #de6f00">Запропонований</span>
                                    </div>
                                    <div>
                                        <a href=" <?=$item['link']?>">Подивитись</a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer -->

</body>
<?php
    require_once 'views/components/js_includes.php';
?>


</html>