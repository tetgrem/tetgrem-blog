<?php
    use App\Services\Select;
    use App\Controllers\PostViewController;

    $link = $_GET['q'];

    $item_main = Select::selectOnePost($link);

    $data = mysqli_fetch_assoc($item_main);

    $id = $data['id'];
    $user_id = $data['user_ids'];

    $status = $data['status'];

    if ($status == 2 && ($_SESSION['user']['user_group'] != 2 && $_SESSION['user']['user_group'] != 3)) \App\Services\Router::redirect('/');

    $category_item = PostViewController::postViewCategoryController($data, $id);
    $author_item = PostViewController::postViewAuthorController($data, $id)
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

    <section class="view__post">
        <div class="main__post">
            <?php foreach ($item_main as $el) { ?>
            <div class="post__top">
                <img src="<?=$el['img']?>" class="view__post-img" alt="post-img">
                <div class="post__info">
                    <div class="post__desc">
                        <h1><?=$el['title']?></h1>
                        <p class="view__post-p"><?=$el['text']?></p>
                    </div>
                    <div class="post__link-date view__post-date">
                        <h3><?=$el['date']?></h3>
                    </div>
                    <div class="post__link-date view__post-date">
                        <span>Автор:  <a href="<?=$el['username']?>"><?=$el['first_name']?> <?=$el['last_name']?></a></span>
                    </div>
                    <div class="post__link-date view__post-date">
                        <span>Категорія:
                            <a href="#">
                                <?php if ($el['status'] == 2) { ?>
                                    <?=$el['new_category']?>
                                <?php } else { ?>
                                    <?=$el['category_name']?>
                                <?php } ?>
                            </a>
                        </span>
                    </div>
                   <?php if ($el['ids'] != $_SESSION['user']['ids'] && $el['status'] != 2) { ?>
                    <div class="post__link-date view__post-date">
                        <div class="appeal__btn">
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"></path>
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"></path>
                                </svg>
                                Скарга
                            </button>

                            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Скарга</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Ви дійсно хочете відправити скаргу на публікацію з назвою: <b><?=$data['title'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                            <form action="/posts/moderation?id=<?=$el['id']?>" method="post">
                                                <button type="submit"  class="btn btn-warning">Відправити</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="view__buttons">
                <?php if ($status != 2) { ?>
                    <?php if ($_SESSION['user']['ids'] == $user_id || $_SESSION['user']['user_group'] == 3 || $_SESSION['user']['user_group'] == 2) { ?>
                        <a href="/edit-post?id=<?=$el['id']?>" class="btn btn-info" style="color: white">Редагувати</a>
                    <?php } ?>

                    <?php if ($_SESSION['user']['user_group'] == 3 || $_SESSION['user']['user_group'] == 2) {
                        if ($data['status'] != 0) { ?>
                            <button type="button"  class="btn btn-warning" style="color: white" data-toggle="modal" data-target="#exampleModal2">
                                Відправити на модерацію
                            </button>

                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Відправка на модерацію</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Ви збираєтесь відправити на модерацію пост під назвою: <b><?=$data['title'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                            <form action="/posts/moderation?id=<?=$el['id']?>" method="post">
                                                <button type="submit"  class="btn btn-warning">Відправити</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }?>


                    <?php if ($_SESSION['user']['id'] == $user_id || $_SESSION['user']['user_group'] == 3) { ?>
                        <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Видалити
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ви дійсно бажаєте видалити цей пост?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Ви збираєтесь видалити пост під назвою: <?=$data['title'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                        <form action="/posts/deletePost?id=<?=$id?>&category_id=<?=$data['category_id']?>" method="post">
                                            <button type="submit"  class="btn btn-danger">Видалити</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                        <div class="comment">
                            <p><b>Коментар: </b><?=$el['comment']?></p>
                        </div>

                    <form action="/posts/add-post-and-new-category?id=<?=$el['id']?>" method="post">
                        <button type="submit" class="btn btn-success" style="color: white">Добавити категорію та пост</button>
                    </form>
                        <button type="button"  class="btn btn-danger btn-remove" data-toggle="modal" data-target="#exampleModal">
                            Відмова та видалення
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ви дійсно бажаєте видалити цей пост?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Ви збираєтесь видалити пост під назвою: <?=$data['title'] ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                        <form action="/posts/delete-post-with-new-category?id=<?=$el['id']?>" method="post">
                                            <button type="submit"  class="btn btn-danger">Видалити</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if ($status != 2) { ?>
                     <div class="another__posts">
                <div class="left__block">
                    <?php if (mysqli_fetch_assoc($category_item) > 0) { ?>
                        <h1>Ще пости в цій категорії:</h1>
                        <?php  foreach ($category_item as $el) { ?>
                            <div class="another__item">
                                <a href="#">
                                    <img src="<?=$el['img']?>" alt="post_img">
                                    <h2><?=$el['title']?></h2>
                                </a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="right__block">
                    <?php if (mysqli_fetch_assoc($author_item) > 0) { ?>
                        <h1>Ще пости від цього автора:</h1>

                        <?php foreach ($author_item as $el) { ?>
                            <div class="another__item">
                                <a href="<?=$el['link']?>">
                                    <img src="<?=$el['img']?>" alt="post_img">
                                    <h2><?=$el['title']?></h2>
                                </a>
                            </div>
                        <?php } ?>
                    <?php }?>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</main>

<!-- Footer -->

</body>
<?php
    require_once 'views/components/js_includes.php';
?>
</html>