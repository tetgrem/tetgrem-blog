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
    <section class="profile__section">
        <h1>Адмін-панель</h1>
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
                        <a href="#settings"  class="nav-link"  aria-controls="settings" role="tab" data-toggle="tab">Перевірка постів</a>
                    </li>
                </ul>
                <!-- Содержимое вкладок -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <ul class="list-group list-group-admin">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Постів на сайті:
                                <span class="badge bg-primary rounded-pill">14</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Зареєстровано користувачів:
                                <span class="badge bg-primary rounded-pill">2</span>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="profile">
                        <ul class="list-group list-group-admin-posts">
                            <li class="list-group-item list-group-item-admin d-flex justify-content-between align-items-center">
                                Назва поста 1
                                <div>
                                    <span>Олексій Копилець | </span>
                                    <a href="#">@username</a>
                                </div>
                                <div>
                                    <span>Статус:</span>
                                    <span style="color: green">Видний</span>
                                </div>
                                <div>
                                    <a href="#">Подивитись</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="messages">
                        <ul class="list-group list-group-admin-posts">
                            <li class="list-group-item list-group-item-admin d-flex justify-content-between align-items-center">
                                Олексій Копилець
                                <div>
                                    <a href="#">@username</a>
                                </div>
                                <div>
                                    <span>Група:</span>
                                    <span>Адмін</span>
                                </div>
                                <div>
                                    <span>Кількість постів</span>
                                    <span><b>12</b></span>
                                </div>
                                <div>
                                    <a href="#">Профіль</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">
                        <ul class="list-group list-group-admin-posts">
                            <li class="list-group-item list-group-item-admin d-flex justify-content-between align-items-center">
                                Назва поста 1
                                <div>
                                    <span>Олексій Копилець | </span>
                                    <a href="#">@username</a>
                                </div>
                                <div>
                                    <span>Статус:</span>
                                    <span style="color: red">Схований</span>
                                </div>
                                <div>
                                    <a href="#">Подивитись</a>
                                </div>
                            </li>
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