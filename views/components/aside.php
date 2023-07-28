<?php
    use App\Services\Select;
    use App\Services\UserInfo;

        $count_all = Select::selectAllCount();
    $count_all = mysqli_fetch_assoc($count_all);

    $categorys = Select::selectAllCategorys();

?>

<div class="user__section">

    <?php if ($_SESSION['user']) { ?>
        <h1>Привіт, <?=$user_info['full_name']?></h1>

        <div class="user__info-top">
            <a href="/profile"> <img src="<?=$user_info['avatar']?>" alt="Avatar"></a>
            <div class="user__info-text">
                <span><a href="#" style="color: #242424"><b>@<?=$_SESSION['user']['username']?></b></a></span>
                <span>Кількість моїх постів: <b><?=$user_info['count']?></b></span>
                <span>Група: <b><?=$user_info['group']?></b></span>
            </div>
        </div>
    <?php } else { ?>

    <h1>Вітаємо, Гість</h1>
    <span>Увійдіть, щоб використовувати весь функціонал сайту!</span>
    <form method="post" action="/auth/login" novalidate class="needs-validation">
        <div class="mb-3">
            <label for="data" class="form-label">Email або Login</label>
            <input type="email" name="data" class="form-control" id="data" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <button type="submit" class="btn btn-outline-success">Увійти</button>
        <span>Немає профілю? <a href="/register">Зареєструйтесь!</a></span>
        <span><a href="/forgot-password">Забули пароль?</a></span>
    </form>
    <?php } ?>
</div>

<div class="categorys__section">
    <h1>Пости по категоріям:</h1>
    <ul class="list-group">
        <li>
            <a href="/" class="list-group-item list-group-item-aside d-flex justify-content-between align-items-center">
                Головна
                <span class="badge bg-primary rounded-pill"><?=$count_all['COUNT(*)']?></span>
            </a>
        </li>
        <?php foreach ($categorys as $el) { ?>
            <li>
                <a href="/category/<?=$el['category_link']?>" class="list-group-item list-group-item-aside d-flex justify-content-between align-items-center">
                    <?=$el['category_name']?>
                    <span class="badge bg-primary rounded-pill"><?=$el['count']?></span>
                </a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="about__section">
    <h1>Про цей сайт</h1>
    <p>Цей сайт був створенний в якості навчального проекту. З використанням мов программування: php, javascript та бази даних MySQL</p>
</div>
<div class="footer">
    <span>© Всі права захищенні. 2023</span>
</div>