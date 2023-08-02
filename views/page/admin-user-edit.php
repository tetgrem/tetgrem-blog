<?php
    use App\Services\Select;
    use App\Services\UserInfo;
    use App\Services\Router;

    if ($_SESSION['user']['user_group'] != 3) \App\Services\Router::redirect('/');
    if (!isset($_GET['user'])) \App\Services\Router::redirect('/');

    $user = $_GET['user'];

    if ($user === $_SESSION['user']['username']) Router::redirect('/profile');

    $user_query = Select::selectOneUser($user);
    $user_array = mysqli_fetch_assoc($user_query);
    $user_info = UserInfo::userInfo($user_array);

    $group = $user_info['group'];


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
        passCheck()
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
    <section class="profile__section register__section">
        <h1>Редагування користувача</h1>
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
        <div class="register__block">
            <form method="post" class="needs-validation" action="/user/admin-edit?user=<?=$user_array['username']?>" novalidate enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Логін</label>
                    <input type="text" name="username" class="form-control" id="username" pattern="^[a-zA-Z0-9]+$" value="<?php echo $user_array['username'];  ?>" maxlength="20" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Ім'я</label>
                    <input type="text" name="first_name" pattern="^[A-Za-zА-Яа-яЁёЇїІіЄєҐґ]+$" class="form-control" value="<?php echo $user_array['first_name'];  ?>" id="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Прізвище</label>
                    <input type="text" name="last_name" pattern="^[A-Za-zА-Яа-яЁёЇїІіЄєҐґ]+$" class="form-control" value="<?php echo $user_array['last_name'];  ?>" id="last_name" required>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Група: (<?php echo $group?>)</label>
                    <select id="category" name="category" class="form-select" aria-label="Default select example">
                            <option value="1">Користувач</option>
                            <option value="2">Модератор</option>
                            <option value="3">Адмін</option>
                            <option value="5">Бан</option>
                    </select>
                </div>

                <div class="login__btns">
                    <button type="submit" class="register__btn btn btn-success">Редагувати</button>

                </div>
            </form>
            <?php $_SESSION['test'] = null ?>
        </div>
    </section>
</main>

<!-- Footer -->
<?php
require_once 'views/components/js_includes.php';
?>

</body>


</html>