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

        <div class="user__section">
            <!-- <h1>Привіт, Олексій Копилець</h1>

             <div class="user__info-top">
                 <img src="https://s3-production-sso.s3.eu-central-1.amazonaws.com/567/kKjIuxcYIJG4xCGU1651766521.jpg" alt="Avatar">
                 <div class="user__info-text">
                     <span><b>@username</b></span>
                     <span>Кількість моїх постів: <b>12</b></span>
                     <span>Група: <b>Адмін</b></span>
                 </div>
             </div>-->


            <h1>Вітаємо, Гість</h1>
            <span>Увійдіть, щоб використовувати весь функціонал сайту!</span>
            <form method="post" action="#" novalidate class="needs-validation">
                <div class="mb-3">
                    <label for="email" class="form-label">Email або Login</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <button type="submit" class="btn btn-outline-success">Увійти</button>
                <span>Немає профілю? <a href="#">Зареєструйтесь!</a></span>
            </form>
        </div>

        <div class="categorys__section">
            <h1>Пости по категоріям:</h1>
            <ul class="list-group">
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                    Головна
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                    PHP
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                    JavaScript
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                    Python
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                    C++
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a href="#" class="list-group-item d-flex justify-content-between align-items-center">
                    Інші
                    <span class="badge bg-primary rounded-pill">14</span>
                </a>
            </ul>
        </div>

        <div class="about__section">
            <h1>Про цей сайт</h1>
            <p>Цей сайт був створенний в якості навчального проекту. З використанням мов программування: php, javascript та бази даних MySQL</p>
        </div>
        <div class="footer">
            <span>© Всі права захищенні. 2023</span>
        </div>
    </aside>
    <section class="main__section">
        <h1>Головна</h1>
        <div class="main__post">
            <div class="post__top">
                <a href="#">
                    <img src="https://pravorskyi.com/wp-content/uploads/2021/06/wpapers_ru_Helloworld.jpg" alt="post-img">
                </a>
                <div class="post__info">
                    <div class="post__desc">
                        <a href="#">Заголовок поста</a>
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="post__cat-aut">
                            <span>Категорія: <a href="#" class="category">PHP</a></span>
                            <span>Автор: <b>Олексій Копилець</b></span>
                        </div>
                    </div>
                    <div class="post__link-date">
                        <h3>Липень 01, 2023, 23:50:53</h3>
                        <a href="#" class="btn btn-outline-secondary">
                            <span>Читати повністю </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main__post">
            <div class="post__top">
                <a href="#">
                    <img src="https://pravorskyi.com/wp-content/uploads/2021/06/wpapers_ru_Helloworld.jpg" alt="post-img">
                </a>
                <div class="post__info">
                    <div class="post__desc">
                        <a href="#">Заголовок поста</a>
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="post__cat-aut">
                            <span>Категорія: <a href="#" class="category">PHP</a></span>
                            <span>Автор: <b>Олексій Копилець</b></span>
                        </div>
                    </div>
                    <div class="post__link-date">
                        <h3>Липень 01, 2023, 23:50:53</h3>
                        <a href="#" class="btn btn-outline-secondary">
                            <span>Читати повністю </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main__post">
            <div class="post__top">
                <a href="#">
                    <img src="https://pravorskyi.com/wp-content/uploads/2021/06/wpapers_ru_Helloworld.jpg" alt="post-img">
                </a>
                <div class="post__info">
                    <div class="post__desc">
                        <a href="#">Заголовок поста</a>
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="post__cat-aut">
                            <span>Категорія: <a href="#" class="category">PHP</a></span>
                            <span>Автор: <b>Олексій Копилець</b></span>
                        </div>
                    </div>
                    <div class="post__link-date">
                        <h3>Липень 01, 2023, 23:50:53</h3>
                        <a href="#" class="btn btn-outline-secondary">
                            <span>Читати повністю </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main__post">
            <div class="post__top">
                <a href="#">
                    <img src="https://pravorskyi.com/wp-content/uploads/2021/06/wpapers_ru_Helloworld.jpg" alt="post-img">
                </a>
                <div class="post__info">
                    <div class="post__desc">
                        <a href="#">Заголовок поста</a>
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="post__cat-aut">
                            <span>Категорія: <a href="#" class="category">PHP</a></span>
                            <span>Автор: <b>Олексій Копилець</b></span>
                        </div>
                    </div>
                    <div class="post__link-date">
                        <h3>Липень 01, 2023, 23:50:53</h3>
                        <a href="#" class="btn btn-outline-secondary">
                            <span>Читати повністю </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main__post">
            <div class="post__top">
                <a href="#">
                    <img src="https://pravorskyi.com/wp-content/uploads/2021/06/wpapers_ru_Helloworld.jpg" alt="post-img">
                </a>
                <div class="post__info">
                    <div class="post__desc">
                        <a href="#">Заголовок поста</a>
                        <p>Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit. Exercitation veniam consequat sunt nostrud amet.</p>
                        <div class="post__cat-aut">
                            <span>Категорія: <a href="#" class="category">PHP</a></span>
                            <span>Автор: <b>Олексій Копилець</b></span>
                        </div>
                    </div>
                    <div class="post__link-date">
                        <h3>Липень 01, 2023, 23:50:53</h3>
                        <a href="#" class="btn btn-outline-secondary">
                            <span>Читати повністю </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z"/>
                            </svg>
                        </a>
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