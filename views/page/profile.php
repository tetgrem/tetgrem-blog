<?php
    if (!$_SESSION['user']) {
        \App\Services\Router::redirect('/login');
    }
?>

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
        <h1>Мій профіль</h1>
        <div class="profile__block">
            <img src="<?=$user_info['avatar']?>" alt="avatar">
            <div class="profile__info">
                <div class="top__item">
                    <h2><?=$user_info['full_name']?></h2>
                    <h3>@<?=$_SESSION['user']['username']?></h3>
                    <h3><?=$_SESSION['user']['email']?></h3>
                    <h4>Група: <b><?=$user_info['group']?></b></h4>
                    <h4>Кількість моїх постів: <b><?=$user_info['count']?></b></h4>
                    <a type="button"  style="color: #2ebaae; margin-top: 20px;" data-toggle="modal" data-target="#exampleModal1">
                        Заміна паролю
                    </a>

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

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Заміна паролю</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" class="needs-validation" action="/user/edit-pass" novalidate enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="password-old" class="form-label">Старий пароль</label>
                                            <input type="password" name="password-old" class="form-control" id="password-old" required>
                                            <div class="invalid-feedback">
                                                Будь ласка, введіть старий пароль.
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Пароль</label>
                                            <input type="password" name="password-new"   class="form-control" id="password" required>
                                            <div class="invalid-feedback">
                                                Будь ласка, введіть пароль.
                                            </div>
                                            <div class="invalid-feedback-pass" style="color: red; margin-top: 10px;"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirm" class="form-label">Підтвердження паролю</label>
                                            <input type="password" name="password_confirm" class="form-control" id="password_confirm" required>
                                            <div class="invalid-feedback">
                                                Будь ласка, повторіть пароль.
                                            </div>
                                            <div class="invalid-feedback-pass-conf" style="color: red; margin-top: 10px;"></div>
                                        </div>
                                        <button disabled type="submit" class="register__btn btn btn-success">Змінити</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom__item">
                    <a href="/user-edit" class="btn btn-warning" style="color: white">Редагувати</a>
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