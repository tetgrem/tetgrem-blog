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
            <img src="https://s3-production-sso.s3.eu-central-1.amazonaws.com/567/kKjIuxcYIJG4xCGU1651766521.jpg" alt="avatar">
            <div class="profile__info">
                <div class="top__item">
                    <h2>Олексій Копилець</h2>
                    <h3>@username</h3>
                    <h3>tetgrem@gmail.com</h3>
                    <h4>Група: <b>Адмін</b></h4>
                    <h4>Кількість моїх постів: <b>12</b></h4>
                    <a type="button"  style="color: #2ebaae; margin-top: 20px;" data-toggle="modal" data-target="#exampleModal1">
                        Заміна паролю
                    </a>

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
                                    <form method="post" class="needs-validation" action="" novalidate enctype="multipart/form-data">
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
                                        <button disabled type="submit" class="register__btn btn btn-success">Увійти</button>
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
                    <a href="#" class="btn btn-warning" style="color: white">Редагувати</a>
                    <button type="button"  class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                        Видалити
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ви дійсно бажаєте видалити цього користувача?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Ви збираєтесь видалити *name*
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
                                    <form action=" " method="post">
                                        <button type="submit"  class="btn btn-danger">Видалити</button>
                                    </form>
                                </div>
                            </div>
                        </div>
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