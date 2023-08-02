<?php
    use App\Services\Select;

    if (isset($_GET['page']) && $_GET['page'] == 0) {
        \App\Services\Router::error('404');
        die();
    }

    $page = isset($_GET['page']) ? $_GET['page']: 1;



    $limit = 5;
    $offset = $limit * ($page - 1);

    $total_pages = Select::selectAllCount();
    $total_pages = mysqli_fetch_assoc($total_pages);
    $total_pages = ceil($total_pages['COUNT(*)'] / $limit);



    $items = Select::selectAllPostsWithStatus('1', $limit, $offset);

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
                require_once 'views/components/navbar.php'
               ?>
            </div>
        </div>
    </div>
</header>
<!-- Main Page -->
<main class="container main__block">
    <aside class="aside__block">
        <?php
            require_once 'views/components/aside.php';
        ?>
    </aside>
    <section class="main__section">

        <?php if (mysqli_fetch_assoc($items) < 1) { ?>
            <h1>Упс... Ще нема жодної публікації :(</h1>
        <?php } else { ?>
            <h1>Головна</h1>
        <?php } ?>
        <?php if ($_SESSION['message-add-post']) { ?>

                <?php
                    echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast  fide show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Повідомлення</strong>
                </div>
                <div class="toast-body">
                    ' . $_SESSION['message-add-post'] . '
                </div>
            </div>
        </div>';
                    $_SESSION['message-add-post'] = null;
                ?>
        <?php } ?>

        <?php if ($_SESSION['message-error']) { ?>

            <?php
            echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast red fide show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header red">
                    <strong class="me-auto">Повідомлення</strong>
                </div>
                <div class="toast-body">
                    ' . $_SESSION['message-error'] . '
                </div>
            </div>
        </div>';
            $_SESSION['message-error'] = null;
            ?>
        <?php } ?>

        <?php if ($_SESSION['message']) { ?>

            <?php
            echo '<div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast  fide show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <strong class="me-auto">Повідомлення</strong>
                </div>
                <div class="toast-body">
                    ' . $_SESSION['message'] . '
                </div>
            </div>
        </div>';
            $_SESSION['message'] = null;
            ?>
        <?php } ?>
        <?php foreach ($items as $el) { ?>
        <div class="main__post">
            <div class="post__top">
                <a href="<?=$el['link']?>">
                    <img src="<?=$el['img']?>" alt="post-img">
                </a>
                <div class="post__info">
                    <div class="post__desc">
                        <a href="<?=$el['link']?>"><?=$el['title']?></a>
                        <p><?=mb_strimwidth($el['text'], 0, 170, '...')?></p>
                        <div class="post__cat-aut">
                            <span>Категорія: <a href="/category/<?=$el['category_link']?>" class="category"><?=$el['category_name']?></a></span>
                            <span>Автор: <b><a href="/@<?=$el['username']?>"><?=$el['first_name'] . ' ' . $el['last_name']?></a> </b></span>
                        </div>
                    </div>
                    <div class="post__link-date">
                        <h3><?=$el['date']?></h3>
                        <a href="/<?=$el['link']?>" class="btn btn-outline-secondary">
                            <span>Читати повністю</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
       <?php require_once 'views/components/pagination.php'?>
    </section>

</main>

<!-- Footer -->

</body>
<?php
    require_once 'views/components/js_includes.php';
?>
</html>