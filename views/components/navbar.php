

<div class="logo"> <a href="/">001: Blog</a> </div>
<nav>
    <ul class="menu">
        <li class="menu__item"><a href="/" class="menu__item-link">Головна</a></li>
        <li class="menu__item"><a href="/todo" class="menu__item-link" style="color: #d74403">TODO</a></li>

        <?php if ($_SESSION['user']) { ?>
            <li class="menu__item"><a href="/my-posts" class="menu__item-link">Мої публікації</a></li>
            <li class="menu__item"><a href="/add-post" class="menu__item-link">Зробити публікацію</a></li>
            <li class="menu__item"><a href="/profile" class="menu__item-link">Мій профіль</a></li>
            <?php if ($_SESSION['user']['user_group'] == 3) { ?>
                <li class="menu__item"><a href="/admin" class="menu__item-link">Адмін панель</a></li>
            <?php } ?>
            <?php if ($_SESSION['user']['user_group'] == 2) { ?>
                <li class="menu__item"><a href="/moder" class="menu__item-link">Панель Модератора</a></li>
            <?php } ?>
            <form method="post" action="/auth/logout">
                <li class="menu__item"><button type="submit" class="menu__item-link btn btn-dark">Вийти</button></li>
            </form>
        <?php } else { ?>
            <li class="menu__item"><a href="/login" class="menu__item-link btn btn-secondary">Увійти</a></li>
            <li class="menu__item"><a href="/register" class="menu__item-link btn btn-info">Реєстрація</a></li>
        <?php } ?>
    </ul>
</nav>

<button class="burger">
    <span></span>
</button>